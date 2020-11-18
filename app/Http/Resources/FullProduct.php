<?php

namespace App\Http\Resources;

use App\Http\Resources\ImageProduct;
use Illuminate\Http\Resources\Json\JsonResource;

class FullProduct extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $imagesProduct = $this->imagesProduct()->get();
        $images = [];

        foreach ($imagesProduct as $image) {
            array_push($images, new ImageProduct($image));
        }

        return [
            'id' => $this->id,
            'nameProduct' => $this->nameProduct,
            'description_prod' => $this->description_prod,
            'costo_prod' => $this->costo_prod,
            'precio_prod' => $this->precio_prod,
            'descuento' => $this->descuento,
            'material_prod' => $this->material_prod,
            'image' => $images,
            'inventory' => $this->inventory()->get(),
            'status' => $this->statusProduct()->get(),
            'category' => $this->category()->get(),
            'provider' => $this->provider()->get()
        ];
    }
}
