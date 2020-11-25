<?php

namespace App\Http\Resources;

use App\Http\Resources\ImageProduct;
use Illuminate\Http\Resources\Json\JsonResource;

class DetailsProduct extends JsonResource
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

        $status = $this->statusProduct()->get()[0];
        $inventory = $this->inventory()->get()[0];
        $category = $this->category()->get()[0];
        $provider = $this->provider()->get()[0];
        $image = $images[0]->url;
        // dd($category);

        return [
            'id' => $this->id,
            'nameProduct' => $this->nameProduct,
            'description_prod' => $this->description_prod,
            'costo_prod' => $this->costo_prod,
            'precio_prod' => $this->precio_prod,
            'descuento' => ($this->descuento == null) ? 0 : $this->descuento,
            'material_prod' => $this->material_prod,
            'image' => url($image),
            'existence_s' => $inventory->eq_s + $inventory->eg_s + $inventory->ec_s,
            'existence_m' => $inventory->eq_m + $inventory->eg_m + $inventory->ec_m,
            'existence_l' => $inventory->eq_l + $inventory->eg_l + $inventory->ec_l,
            'status' => $status->nameStatus,
            'category' => $category->nameCategory,
            'provider' => $provider->nameProvider
        ];
    }
}
