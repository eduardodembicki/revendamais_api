<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Cep extends JsonResource
{
    public function toArray($request){
    //return parent::toArray($request);
    return [
        'id' => $this->id,
        'cep' => $this->cep,
        'logradouro' => $this->logradouro
    ];
    }
}
