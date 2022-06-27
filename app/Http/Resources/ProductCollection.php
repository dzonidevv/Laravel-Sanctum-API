<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [

            'ID' => $this->id,
            'Product Name' => $this->name,
            'Description' => $this->description,
            'Product Price' => $this->price,
            'href' => [
                'product link' => route('products.show', $this->id)
            ],

        ];
    }
}
