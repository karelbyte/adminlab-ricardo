<?php

namespace App\Http\Resources;

use App\Models\ServiceDetails;
use Illuminate\Http\Resources\Json\JsonResource;

class ServicesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
       
       /*if ($this->analysis) {
           $analisis = $this->analysis->count() > 1 ? 'Multiples' : $this->analysis->first()->description;
       } else {
        $analisis ="Falta el analisis";   
       }*/

       $detail = ServiceDetails::where('service_id', $this->id)->get();

       if ($detail !== null && $detail->count() > 0 ) {
            $analisis = $detail->count() > 1 ? 'MULTIPLES' :  $detail->first()->description;

       } else { $analisis="FALTA EL ANALISIS DEL PACIENTE";}




        return [
            'id' => $this->id,
            'discount' => $this->discount,
            'price' => $this->price,
            'advance' => $this->advance,
            'balance' => number_format($this->price - $this->advance, 2, '.', ''),
            'moment'=> $this->moment,
            'doctor_id' =>  $this->doctor_id,
            'client_id' => $this->client_id,
            'client' => $this->client->names,
            'doctor' => $this->doctor->names,
            'status_id' => $this->status_id,
            'location_id' => $this->location_id,
            'status' => $this->status->description,
            'barcode' => $this->barcode,
            'barcode_quantity' => $this->barcode_quantity,
            'note' => $this->note,
            'analysis' => ServiceDetailsResource::collection($this->analysis),
            'analysis_description' =>  $analisis
        ];
    }
}
