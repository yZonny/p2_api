<?php

namespace App\Http\Resources;


use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\ReviewResource;

class UsuarioResource extends JsonResource
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
            'id'        => $this->id,
            'nome'      => $this->nome,
            'email'     => $this->email,
            'senha'     => $this->senha,
            'reviews'   => ReviewResource::collection($this->whenLoaded('reviews'))
        ];
    }
}