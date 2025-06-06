<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\LivroResource;
use App\Http\Resources\UsuarioResource;
use Illuminate\Http\Request;

class ReviewResource extends JsonResource
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
            'livre_id' => $this->livro_id,
            'usuario_id' => $this->usuario_id,
            'nota' => $this->nota,
            'comentario' => $this->comentario,
            'livro' => new LivroResource($this->whenLoaded('livro')),
            'usuario' => new UsuarioResource($this->whenLoaded('usuario'))
        ];
    }
}