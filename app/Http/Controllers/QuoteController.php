<?php

namespace App\Http\Controllers;

use App\Http\Resources\QuoteResource;
use App\Models\Analyses;
use App\Models\Client;
use App\Models\Quote;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    public function resources() {
        $data = [
            'analysis' => Analyses::query()->select('id', 'code', 'description', 'content', 'price')->get(),
        ];
        return response()->json($data);
    }

    public function list(Request $request)
    {
        $take = (int) $request->input('pagination.rowsPerPage');
        $skip = ((int) $request->input('pagination.page') -1 ) * $take;
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
                $data->where($field,  'LIKE', '%'.$value .'%') :
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

    public function report($id) {

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

    public function quoteNote($id) {
        $pdf = \App::make('snappy.pdf.wrapper');
        $data = Quote::with(['details' => function ($q) {
            $q->with('analyses');
        }])->where('id', $id)->first();

        //  return $data;
        $view = view('quote-ticket', compact('data'))->render();
        $pdf->loadHTML($view)->setOption('page-width', '80')
            ->setOption('page-height', '500')
            ->setOption('margin-left','0')
            ->setOption('margin-right','0')
            ->setOption('margin-top','0')
            ->setOption('margin-bottom','0');
        return $view; // $pdf->inline();
    }
}
