<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'livro_id' => 'sometimes|exists:livro,id',
            'usuario_id' => 'sometimes|exists:usuarios,id',
            'nota' => 'sometimes|integer|min:0|max:5',
            'comentario' => 'nullable|string|max:1000'
        ];
    }
}