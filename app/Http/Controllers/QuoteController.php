<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Quote;
use App\Models\Client;
use App\Models\Service;
use App\Models\Analyses;
use App\Models\Surrogate;
use Illuminate\Http\Request;
use App\Http\Resources\QuoteResource;

class QuoteController extends Controller
{
    public function resources()
    {
        $data = [
            'analysis' => Analyses::query()->select('id', 'code', 'description', 'content', 'price')->get(),
        ];
        return response()->json($data);
    }

    public function list(Request $request)
    {
        $take = (int) $request->input('pagination.rowsPerPage');
        $skip = ((int) $request->input('pagination.page') - 1) * $take;
        $data = Quote::query();
        $sortBy = $request->input('pagination.sortBy');
        if ($sortBy !== null && $sortBy !== '') {
            $sort = (bool) $request->input('pagination.descending') ? 'desc' : 'asc';
            $data = $data->orderby($sortBy, $sort);
        }
        $value = $request->input('filter.val');
        if ($value !== null && $value !== '') {
            $field = $request->input('filter.field.value');
            $data = $request->input('filter.field.type') === 'text' ?
                $data->where($field,  'LIKE', '%' . $value . '%') :
                $data->where($field, $value);
        }
        $total = $data->select('*')->count();
        $list = $data->skip($skip)->take($take)->get();
        $result = [
            'total' => $total,
            'list' => QuoteResource::collection($list),
        ];
        return response()->json($result);
    }


    public function store(Request $request)
    {
        $service = Quote::create($request->all());
        $details = $request->input('analysis');

        foreach ($details as $det) {
            $service->details()->create([
                'analysis_id' => $det['analysis_id'],
                'price' => $det['price'],
            ]);
        }
        return response()->json('Datos guardados correctamente.');
    }

    public function report($id)
    {

        $pdf = \App::make('snappy.pdf.wrapper');
        $data = Quote::with(['details' => function ($q) {
            $q->with('analyses');
        }])->where('id', $id)->first();

        $footer = view('footer-quote')->render();
        $header = view('header')->render();

        $view = view('quote', compact('data'))->render();
        $pdf->loadHTML($view)->setOption('header-html', $header)
            ->setOption('footer-html', $footer);
        return  $pdf->inline();
    }

    public function quoteNote($id)
    {
        $pdf = \App::make('snappy.pdf.wrapper');
        $data = Quote::with(['details' => function ($q) {
            $q->with('analyses');
        }])->where('id', $id)->first();

        //  return $data;
        $view = view('quote-ticket', compact('data'))->render();
        $pdf->loadHTML($view)->setOption('page-width', '80')
            ->setOption('page-height', '500')
            ->setOption('margin-left', '0')
            ->setOption('margin-right', '0')
            ->setOption('margin-top', '0')
            ->setOption('margin-bottom', '0');
        return $view; // $pdf->inline();
    }

    public function generateService(Request $request)
    {

        $quote = Quote::with(['details' => function ($q) {
            $q->with('analyses');
        }])->where('id', $request->quoteId)->first();

        $client = Client::query()->create([
            'names' => $request->names,
            'birthday' => $request->birthday,
            'email' => $request->email,
            'telf' => $request->telf,
            'note' => $request->note,
        ]);

        $data = [
            'client_id' => $client->id,
            'moment' => Carbon::now(),
            'doctor_id' => 6,
            'location_id' => 1,
            'price' => $quote->amount,
            'note' => '',
            'barcode' => $this->generateBarcode($client->names),
            'barcode_quantity' => 1,
            'discount' => 0,
            'advance' => 0,
            'status_id' => 1
        ];

        $service = Service::query()->create($data);
        $details = $quote->details;
        $priceTotal = 0;
        foreach ($details as $det) {
            $content = Analyses::query()->find($det['analysis_id']);
            $service->analysis()->create([
                'analysis_id' => $det['analysis_id'],
                'content' => $content->content,
                'price' => $det['price'],
                'description' => $content->description,
            ]);
            $priceTotal +=  $det['price'];
        }
        $service->price =  $priceTotal - $request->input('discount');
        $service->save();
        $moment = Carbon::now()->startOfMonth();
        $surrogate = Surrogate::query()->firstWhere([
            ['moment', '>=', $moment],
            ['moment', '<=', $moment]
        ]);
        $surrogate->next++;
        $surrogate->save();

        $quote->delete();
        return response()->json('Servicio creado correctamente.');
    }

    function generateBarcode($name)
    {
        $monthNames = [
            'E', 'F', 'MA', 'A', 'MY', 'J',
            'JL', 'AG', 'S', 'O', 'N', 'D'
        ];
        $moment = Carbon::now()->startOfMonth();
        $surrogate = Surrogate::query()->firstOrCreate([
            ['moment', '>=', $moment],
            ['moment', '<=', $moment]
        ], ['moment' => $moment, 'next' => 1]);

        $clienteId = $surrogate->next;

        // return [$name, $clienteId, collect(explode(" ", $name))];

        $initials = collect(explode(" ", $name))->reduce(function ($carry, $item) {
            return $carry . strtoupper(substr($item, 0, 1));
        });

        return 'A' . $monthNames[Carbon::now()->month - 1]. $clienteId . $initials;
    }
}
