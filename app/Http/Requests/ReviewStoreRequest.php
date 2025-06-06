<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'livro_id' => 'required|exists:livro,id',
            'usuario_id' => 'required|exists:usuarios,id',
            'nota' => 'required|integer|min:0|max:5',
            'comentario' => 'nullable|string|max:1000'
        ];
    }
}