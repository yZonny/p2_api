<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\LivroResource;

class GeneroResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        return [
            'id'   => $this->id,
            'nome' => $this->nome,
            'livros' => LivroResource::collection($this->whenLoaded('livros')),
        ];
    }
}