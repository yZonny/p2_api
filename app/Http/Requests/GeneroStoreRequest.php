<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GeneroStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nome' => 'required|string|max:255|unique:genero,nome',
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O nome do gênero é obrigatório.',
            'nome.string' => 'O nome do gênero deve ser uma string.',
            'nome.max' => 'O nome do gênero não pode exceder 255 caracteres.',
            'nome.unique' => 'Este gênero já está cadastrado.',
        ];
    }
}