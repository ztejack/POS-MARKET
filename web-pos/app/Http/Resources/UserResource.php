<?php

namespace App\Http\Resources;

use App\Models\Satker as ModelSatkers;
use App\Models\Perusahaan as ModelsPerusahaan;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'Nama' => $this->name,
            'UserName' => $this->username,
            'Telepon' => $this->phonenumber,
            'Email' => $this->email,
            'Perusahaan' => ModelsPerusahaan::where('id','=',ModelSatkers::where('id','=',$this->satker_id)->value('perusahaan_id'))->value('nama_perusahaan'),
            'SatuanKerja' => ModelSatkers::where('id','=',$this->satker_id)->value('satker'),
        ];
    }
}
