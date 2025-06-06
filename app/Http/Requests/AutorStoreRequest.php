<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AutorStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:autor,email',
            'data_nascimento' => 'required|date',
            'biografia' => 'nullable|string|max:1000',
        ];
    }
    public function messages()
    {
        return [
            'nome.required' => 'O nome do autor é obrigatório.',
            'nome.string' => 'O nome do autor deve ser uma string.',
            'nome.max' => 'O nome do autor não pode exceder 255 caracteres.',
            'email.required' => 'O email do autor é obrigatório.',
            'email.email' => 'O email do autor deve ser um endereço de email válido.',
            'email.unique' => 'Este email já está cadastrado para outro autor.',
            'data_nascimento.required' => 'A data de nascimento do autor é obrigatória.',
            'data_nascimento.date' => 'A data de nascimento do autor deve ser uma data válida.',
            'biografia.string' => 'A biografia do autor deve ser uma string.',
            'biografia.max' => 'A biografia do autor não pode exceder 1000 caracteres.'
        ];
    }
}