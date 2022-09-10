<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class QuoteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        return [
            'id' => $this->id,
            'client_name' => $this->client_name,
            'amount' => $this->amount,
            'status' => $this->status == 0 ? 'PROSPECTO' : 'CLIENTE' ,
            'created_at' => $this->created_at->format('Y-m-d')
        ];
    }
}
