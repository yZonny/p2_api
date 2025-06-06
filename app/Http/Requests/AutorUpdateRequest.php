<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;


class AutorUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nome' => 'sometimes|string|max:255',
            'email' => 'sometimes|email|max:255|unique:autor,email,' . $this->route('autor'),
            'biografia' => 'nullable|string',
            'data_nascimento' => 'sometimes|date'
        ];
    }
    public function messages()
    {
        return [
            'nome.sometimes' => 'O nome do autor é obrigatório.',
            'nome.string' => 'O nome do autor deve ser uma string.',
            'nome.max' => 'O nome do autor não pode exceder 255 caracteres.',
            'email.sometimes' => 'O email do autor é obrigatório.',
            'email.email' => 'O email do autor deve ser um endereço de email válido.',
            'email.max' => 'O email do autor não pode exceder 255 caracteres.',
            'email.unique' => 'Este email já está cadastrado para outro autor.',
            'biografia.string' => 'A biografia do autor deve ser uma string.',
            'data_nascimento.sometimes' => 'A data de nascimento do autor é obrigatória.',
            'data_nascimento.date' => 'A data de nascimento do autor deve ser uma data válida.'
        ];
    }
}