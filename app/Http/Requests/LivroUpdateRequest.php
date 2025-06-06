<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LivroUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'titulo' => 'sometimes|sometimes|string|max:255',
            'sinopse' => 'nullable|string|max:1000',
            'genero_id' => 'sometimes|exists:genero,id',
            'autor_id' => 'sometimes|exists:autor,id'
        ];
    }
    public function messages()
    {
        return [
            'titulo.sometimes' => 'O título do livro é obrigatório.',
            'titulo.string' => 'O título do livro deve ser uma string.',
            'titulo.max' => 'O título do livro não pode exceder 255 caracteres.',
            'sinopse.string' => 'A sinopse do livro deve ser uma string.',
            'sinopse.max' => 'A sinopse do livro não pode exceder 1000 caracteres.',
            'genero_id.sometimes' => 'O gênero do livro é obrigatório.',
            'genero_id.exists' => 'O gênero selecionado não existe.',
            'autor_id.sometimes' => 'O autor do livro é obrigatório.',
            'autor_id.exists' => 'O autor selecionado não existe.'
        ];
    }
}