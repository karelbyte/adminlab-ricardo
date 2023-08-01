<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Client;
use App\Models\Doctor;
use http\Env\Response;
use App\Models\Service;
use App\Models\Analyses;
use App\Models\Location;
use App\Models\Surrogate;
use Illuminate\Http\Request;
use App\Models\ServiceDetails;
use App\Mail\ClientServiceResult;
use Spatie\Dropbox\Client as Dbox;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\ServicesResource;
use GuzzleHttp\Client as Guz;

class ServiceController extends Controller
{
    public function resources()
    {
        $data = [
            'clients' => Client::query()->select('id', 'names')->orderBy('id', 'desc')->get(),
            'analysis' => Analyses::query()->select('id', 'code', 'description', 'content', 'price')->get(),
            'doctors' => Doctor::query()->select('id', 'names')->orderBy('id', 'desc')->get(),
            'locations' => Location::query()->select('id', 'names', 'symbol')->orderBy('id', 'desc')->get(),
            'next' => $this->getNextNumberClient()
        ];
        return response()->json($data);
    }

    function getNextNumberClient()
    {
        $moment = Carbon::now()->startOfMonth();
        $surrogate = Surrogate::query()->firstOrCreate([
            ['moment', '>=', $moment],
            ['moment', '<=', $moment]
        ], ['moment' => $moment, 'next' => 1]);
        $result = $surrogate->next;
        return $result;
    }

    function getAge($age)
    {
        $cumpleanos = Carbon::parse($age);
        $hoy = Carbon::now();
        $annos = $hoy->diffInYears($cumpleanos);
        return $annos;
    }

    public function getContent($id)
    {
        $cont = ServiceDetails::query()->find($id);
        $service = Service::query()->find($cont->service_id);
        $doctor = (Doctor::query()->find($service->doctor_id))->names;
        $moment = Carbon::parse($service->moment)->format('d-m-Y');
        $code = $service->barcode;
        $client = Client::query()->find($service->client_id);
        $name = $client->names;
        $age = $this->getAge($client->birthday);
        $content = '';
        if ($cont->head !== 1) {
            $header = '<br><br><br><br><br>' .
                '<span  style="margin-left:140px"><span  style="margin-right:30px">MEDICO:</span> <b>' . $doctor . '</b></span><br>'
                . '<span  style="margin-left:140px"><span  style="margin-right:39px">FECHA:</span> <b>' . $moment . '</b></b></span><br>'
                . '<span  style="margin-left:140px"><span  style="margin-right:16px">PACIENTE:</span> <b>' . $name . '</b>&nbsp;&nbsp;</span><br>'
                . '<span  style="margin-left:140px"><span  style="margin-right:48px">EDAD:</span> <b>' . $age . ' A&Ntilde;OS</b>&nbsp;&nbsp;</span><br>'
                . '<span  style="margin-left:140px"><span  style="margin-right:41px">CLAVE:</span> <b>' . $code . '</b>&nbsp;&nbsp;</span>';
            $content = $header . $cont->content;
        } else {
            $content = $cont->content;
        }

        return response()->json($content);
    }

    public function setStatus(Request $request)
    {


        $data = Service::query()->with(['analysis' => function ($q) {
            $q->with('analysis');
        }, 'client', 'doctor'])->find($request->id);

        $attachs = [];
        $footer = view('footer')->render();
        $header = view('header')->render();

        $client = new Dbox(config('services.dropbox.token'));

        $pdf = \App::make('snappy.pdf.wrapper');
        $pdf->setTimeout(120);


        foreach ($data->analysis as $key => $detail) {
            $nameFile = $data->barcode . '-' . $detail->analysis->code . now()->timestamp . '.pdf';
            $path = storage_path('app/docs/services/' . $nameFile);
            $doctor = (Doctor::query()->find($data->doctor_id))->names;
            $moment = $data->moment;
            $code = $data->barcode;
            $client = Client::query()->find($data->client_id);
            $name = $client->names;
            $age = $this->getAge($client->birthday);

            if ($detail->head == 0) {
                $heads = '<span  style="margin-left:200px"><span  style="margin-right:30px">MEDICO:</span> <b>' . $doctor . '</b></span><br>'
                    . '<span  style="margin-left:200px"><span  style="margin-right:39px">FECHA:</span> <b>' . $moment . '</b></b></span><br>'
                    . '<span  style="margin-left:200px"><span  style="margin-right:16px">PACIENTE:</span> <b>' . $name . '</b>&nbsp;&nbsp;</span><br>'
                    . '<span  style="margin-left:200px"><span  style="margin-right:48px">EDAD:</span> <b>' . $age . ' A&Ntilde;OS</b>&nbsp;&nbsp;</span><br>'
                    . '<span  style="margin-left:200px"><span  style="margin-right:41px">CLAVE:</span> <b>' . $code . '</b>&nbsp;&nbsp;</span>';
                $content = $heads . $detail->content;
            } else {
                $content = $detail->content;
            }



            $pdf->loadHtml($content)
                ->setOption('header-html', $header)
                ->setOption('footer-html', $footer);

            $pdf->save($path);

            $contenido = file_get_contents($path);

            //$accessToken = config('services.dropbox.token');

            // URL de la API de Dropbox para subir archivos
            //$url = 'https://content.dropboxapi.com/2/files/upload';

            $url = 'http://storelab.jet/api/store';

            // Configurar el encabezado de la solicitud
            $client = new Guz();
            $response = $client->post($url, [
                'multipart' => [
                    [
                        'name'     => 'file',
                        'contents' => fopen($path, 'r')
                    ],
                ]
            ]);

            $data = json_decode($response->getBody(), true);
            $namePublico = $data['name'];


            // $urlObtenerEnlace = 'https://api.dropboxapi.com/2/sharing/create_shared_link_with_settings';

            // $headersObtenerEnlace = [
            //     'Authorization' => 'Bearer ' . $accessToken,
            //     'Content-Type' => 'application/json',
            // ];

            // $bodyObtenerEnlace = json_encode([
            //     'path' => $namePublico,
            // ]);

            // $responseObtenerEnlace = $client->post($urlObtenerEnlace, [
            //     'headers' => $headersObtenerEnlace,
            //     'body' => $bodyObtenerEnlace,
            // ]);

            // $dataObtenerEnlace = json_decode($responseObtenerEnlace->getBody(), true);

            // $enlacePublicoDescarga = $dataObtenerEnlace['url'];

            $attachs[] = [
                'path' . $key => 'http://storelab.jet/storage/' . $namePublico
            ];
        }

        $service = Service::query()->find($request->id);
        // $service->status_id = 2;
        $service->urls = $attachs;
        $service->advance = $service->price;
        $service->save();

        return response()->json('Se cambio el estado del servicio a entregado!'); // 
    }

    public function storeContent(Request $request)
    {
        ServiceDetails::query()->where('id', $request->input('id'))->update([
            'content' => $request->input('content'),
            'head' => 1
        ]);
        return response()->json('Datos actulizados con exito!');
    }

    public function list(Request $request)
    {
        $take = (int) $request->input('pagination.rowsPerPage');
        $skip = ((int) $request->input('pagination.page') - 1) * $take;
        $data = Service::query()->with('analysis');
        $sortBy = $request->input('pagination.sortBy');
        if ($sortBy !== null && $sortBy !== '') {
            $sort = (bool) $request->input('pagination.descending') ? 'desc' : 'asc';
            $data->orderby($sortBy, $sort);
        }
        $value = $request->input('filter.val');
        if ($value !== null && $value !== '') {
            $tableJoin = $request->input('filter.field.join');
            if ($tableJoin !== null) {
                $data = $data->leftJoin($tableJoin, $tableJoin . '.id', 'services.' . substr($tableJoin, 0, -1) . '_id');
            }
            $field = $request->input('filter.field.value');
            $data = $request->input('filter.field.type') === 'text' ?
                $data->whereRaw("$field like  '%$value%'") :
                $data->where($field, $value);
        }

        $total = $data->select('services.*')->count();
        $list = $data->skip($skip)->take($take)->get();
        $result = [
            'total' => $total,
            'list' => ServicesResource::collection($list),
        ];
        return response()->json($result);
    }

    public function store(Request $request)
    {
        $service = Service::query()->create($request->all());
        $details = $request->input('analysis');
        $priceTotal = 0;
        foreach ($details as $det) {
            $content = Analyses::query()->find($det['analysis_id']);
            $service->analysis()->create([
                'analysis_id' => $det['analysis_id'],
                'content' => $content->content,
                'price' => $det['price'],
                'description' => $det['description'],
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
        return response()->json('Datos guardados correctamente.');
    }

    public function update(Request $request)
    {
        $service = Service::query()->find($request->id);
        $service->update(
            $request->except('barcode')
        );
        $service->analysis()->delete();
        $details = $request->input('analysis');
        $priceTotal = 0;
        foreach ($details as $det) {
            $content = Analyses::query()->find($det['analysis_id']);
            $service->analysis()->create([
                'analysis_id' => $det['analysis_id'],
                'content' => $content->content,
                'price' => $det['price'],
                'description' => $det['description'],
            ]);
            $priceTotal +=  $det['price'];
        }
        $service->price =  $priceTotal - $request->input('discount');
        $service->save();
        return response()->json('Datos actualizados correctamente.');
    }

    public function destroy(Request $request)
    {
        Service::query()->where('id', $request->id)->delete();
        return response()->json('Dato eliminado correctamente.');
    }

    public function salesNote($id)
    {
        $pdf = \App::make('snappy.pdf.wrapper');
        $data = Service::query()->with(['analysis' => function ($q) {
            $q->with('analysis');
        }, 'client'])->find($id);

        //  return $data;
        $view = view('ticket', compact('data'))->render();
        $pdf->loadHTML($view)->setOption('page-width', '80')
            ->setOption('page-height', '500')
            ->setOption('margin-left', '0')
            ->setOption('margin-right', '0')
            ->setOption('margin-top', '0')
            ->setOption('margin-bottom', '0');
        return $view; // $pdf->inline();
    }

    public function info()
    {

        $data = Service::query()->with(['analysis' => function ($q) {
            $q->with('analysis');
        }, 'client', 'doctor'])->where('moment', now()->format('Y-m-d'))->get();

        $view = view('info', ['data' => $data])->render();

        return $view;
    }

    public function sendMail(Request $request)
    {


        $data = Service::query()->with(['analysis' => function ($q) {
            $q->with('analysis');
        }, 'client', 'doctor'])->find($request->id);

        $mail = $data->client->email;

        if ($mail != null) {

            $attachs = [];
            $footer = view('footer')->render();
            $header = view('header')->render();

            foreach ($data->analysis as $detail) {

                $pdf = \App::make('snappy.pdf.wrapper');

                $path = storage_path('app\\docs\\services\\' . $data->barcode . '-' . $detail->analysis->code . now()->timestamp . '.pdf');

                $doctor = (Doctor::query()->find($data->doctor_id))->names;
                $moment = $data->moment;
                $code = $data->barcode;
                $client = Client::query()->find($data->client_id);
                $name = $client->names;
                $age = $this->getAge($client->birthday);



                if ($detail->head == 0) {
                    $heads = '<span  style="margin-left:200px"><span  style="margin-right:30px">MEDICO:</span> <b>' . $doctor . '</b></span><br>'
                        . '<span  style="margin-left:200px"><span  style="margin-right:39px">FECHA:</span> <b>' . $moment . '</b></b></span><br>'
                        . '<span  style="margin-left:200px"><span  style="margin-right:16px">PACIENTE:</span> <b>' . $name . '</b>&nbsp;&nbsp;</span><br>'
                        . '<span  style="margin-left:200px"><span  style="margin-right:48px">EDAD:</span> <b>' . $age . ' A&Ntilde;OS</b>&nbsp;&nbsp;</span><br>'
                        . '<span  style="margin-left:200px"><span  style="margin-right:41px">CLAVE:</span> <b>' . $code . '</b>&nbsp;&nbsp;</span>';
                    $content = $heads . $detail->content;
                } else {
                    $content = $detail->content;
                }



                $pdf->loadHtml($content)
                    ->setOption('header-html', $header)
                    ->setOption('footer-html', $footer);

                $pdf->save($path);


                $attachs[] = [
                    $path,
                    [
                        'as' =>  $data->barcode . '-' . $detail->analysis->code . '.pdf',
                        'mine' => 'application/pdf'
                    ]
                ];
            }

            $data = [
                'data' => $data,
                'attachs' => $attachs
            ];

            $mails = explode(',', $mail);
            foreach ($mails as $sedMail) {
                Mail::to($sedMail)->send(new ClientServiceResult($data));
            }

            return response()->json('Datos enviados al cliente.');
        }


        return response()->json('Verifique la dirección de correo electrónico del cliente.', 500);
    }


    public function viewMail()
    {


        $data = Service::query()->with(['analysis' => function ($q) {
            $q->with('analysis');
        }, 'client', 'doctor'])->find(3653);

        $mail = $data->client->email;

        if ($mail != null) {

            $attachs = [];

            $header = view('header')->render();
            $footer = view('footer')->render();

            // return $footer;
            foreach ($data->analysis as $detail) {

                $pdf = \App::make('snappy.pdf.wrapper');

                $path = storage_path('app\\docs\\services\\' . $data->barcode . '-' . $detail->analysis->code . '.pdf');

                if (Storage::disk('local')->exists('\\docs\\services\\' . $data->barcode . '-' . $detail->analysis->code . '.pdf')) {
                    Storage::disk('local')->delete('\\docs\\services\\' . $data->barcode . '-' . $detail->analysis->code . '.pdf');
                }

                $doctor = (Doctor::query()->find($data->doctor_id))->names;
                $moment = $data->moment;
                $code = $data->barcode;
                $client = Client::query()->find($data->client_id);
                $name = $client->names;
                $age = $this->getAge($client->birthday);

                $head = '<span  style="margin-left:200px"><span  style="margin-right:30px">MEDICO:</span> <b>' . $doctor . '</b></span><br>'
                    . '<span  style="margin-left:200px"><span  style="margin-right:39px">FECHA:</span> <b>' . $moment . '</b></b></span><br>'
                    . '<span  style="margin-left:200px"><span  style="margin-right:12px">PACIENTE:</span> <b>' . $name . '</b>&nbsp;&nbsp;</span><br>'
                    . '<span  style="margin-left:200px"><span  style="margin-right:49px">EDAD:</span> <b>' . $age . ' A&Ntilde;OS</b>&nbsp;&nbsp;</span><br>'
                    . '<span  style="margin-left:200px"><span  style="margin-right:42px">CLAVE:</span> <b>' . $code . '</b>&nbsp;&nbsp;</span>';


                $content = $head . $detail->content;

                $pdf->loadHtml($content)
                    ->setOption('header-html', $header)
                    ->setOption('footer-html', $footer);

                return   $pdf->inline();
            }
        }


        return response()->json('Verifique la dirección de correo electrónico del cliente.', 500);
    }
}


/*$data = Service::query()->with(['analysis' => function($q) {
            $q->with('analysis');
        }, 'client', 'doctor'])->find($request->id);

        $mail = $data->client->email;

        if ($mail != null) { 

            $attachs = [];
            $footer = view('footer')->render();
            $header = view('header')->render();

            foreach ($data->analysis as $detail) {

                $pdf = \App::make('snappy.pdf.wrapper');

                $path = storage_path('app\\docs\\services\\'.$data->barcode. '-'. $detail->analysis->code. now()->timestamp . '.pdf');

                $doctor = (Doctor::query()->find($data->doctor_id))->names;
                $moment = $data->moment;
                $code = $data->barcode;
                $client = Client::query()->find($data->client_id);
                $name = $client->names;
                $age = $this->getAge($client->birthday);

               /* $head = '<span  style="margin-left:200px"><span  style="margin-right:30px">MEDICO:</span> <b>'.$doctor.'</b></span><br>'
                    .'<span  style="margin-left:200px"><span  style="margin-right:39px">FECHA:</span> <b>'.$moment. '</b></b></span><br>'
                    .'<span  style="margin-left:200px"><span  style="margin-right:12px">PACIENTE:</span> <b>'.$name.'</b>&nbsp;&nbsp;</span><br>'
                    .'<span  style="margin-left:200px"><span  style="margin-right:49px">EDAD:</span> <b>'.$age.' A&Ntilde;OS</b>&nbsp;&nbsp;</span><br>'
                    .'<span  style="margin-left:200px"><span  style="margin-right:42px">CLAVE:</span> <b>'.$code.'</b>&nbsp;&nbsp;</span>';

                $content =  $detail->content; 

                if ($detail->head !== 1) {
                    $header = '<br><br><br><br><br><br>'.
                        '<span  style="margin-left:200px"><span  style="margin-right:30px">MEDICO:</span> <b>'.$doctor.'</b></span><br>'
                            .'<span  style="margin-left:200px"><span  style="margin-right:39px">FECHA:</span> <b>'.$moment. '</b></b></span><br>'
                            .'<span  style="margin-left:200px"><span  style="margin-right:16px">PACIENTE:</span> <b>'.$name.'</b>&nbsp;&nbsp;</span><br>'
                            .'<span  style="margin-left:200px"><span  style="margin-right:48px">EDAD:</span> <b>'.$age.' A&Ntilde;OS</b>&nbsp;&nbsp;</span><br>'
                            .'<span  style="margin-left:200px"><span  style="margin-right:41px">CLAVE:</span> <b>'.$code.'</b>&nbsp;&nbsp;</span>';
                    $content = $header . $detail->content;
                } else {
                    $content = $detail->content;
                }
    
             
                $pdf->loadHtml( $detail->content)
                ->setOption('header-html', $header)
                ->setOption('footer-html', $footer);
    
                $pdf->save($path);


                $attachs[] = [
                    $path, 
                    [
                        'as' =>  $data->barcode. '-'. $detail->analysis->code. '.pdf',
                        'mine' => 'application/pdf'
                    ]
                ];

            }

             $data = [
               'data' => $data,
               'attachs' => $attachs
             ];

             Mail::to($mail)->send(new ClientServiceResult($data));
             return response()->json('Datos enviados al cliente.');
        } 

        
        return response()->json('Verifique la dirección de correo electrónico del cliente.', 500);*/