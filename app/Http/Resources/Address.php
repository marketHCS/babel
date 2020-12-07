<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Address extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //       "street": "Calle de prueba",
        // "exteriorNumberAddress": 15,
        // "interiorNumberAddress": 15,
        // "suburb": "Colonia de prueba",
        // "city": "Tula",
        // "estate": "Hidalgo",
        // "cp": 42805,
        // "id": 16

        return [

        ];
    }
}
