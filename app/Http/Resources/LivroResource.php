<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\AutorResource;

class LivroResource extends JsonResource
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
            'id' => $this->id,
            'titulo' => $this->titulo,
            'sinopse' => $this->sinopse,
            'genero' => new GeneroResource($this->whenLoaded('genero')),
            'autor' => new AutorResource($this->whenLoaded('autor')),
            'reviews' => ReviewResource::collection($this->whenLoaded('review'))
        ];
    }
}
