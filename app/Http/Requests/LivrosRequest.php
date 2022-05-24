<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LivrosRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nome' => 'required|min:3',
            'autor_id' => 'required',
            'tipo' => 'required',
            'editora_id' => 'required',
            'edicao' => 'required'
            
        ];
    }

    public function messages()
    {
        return [
            'nome.*' => 'O nome é obrigatório e deve ter pelo menos 3 caracteres',
            'autor_id.required' => 'Selecione o autor',
            'tipo.required' => 'Selecione o tipo de livro',
            'editora_id.required' => 'Selecione a editora.',
            'edicao.required' => 'A edição deve ser preenchida.'
        ];
    }
}
