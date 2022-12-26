<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'kodePrd' => $this->kodePrd,
            'namaPrd' => $this->namaPrd,
            'stok' => $this->stok,
            'satuan' => $this->satuan,
            'price' => $this->price,
            'modalprice' => $this->modalprice,
            'oldprice' => $this->oldprice,
        ];
    }
}
