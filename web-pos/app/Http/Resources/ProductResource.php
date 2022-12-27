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
            'Kode_Barang' => $this->kodePrd,
            'Nama_Barang' => $this->namaPrd,
            'stok' => $this->stok,
            'satuan' => $this->satuan,
            'Harga' => $this->price,
        ];
    }
}
