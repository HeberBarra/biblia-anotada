<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class LivroRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:50',
            'quantidadeCapitulos' => 'required|numeric|min:1|integer:',
            'codigoCategoria' => 'required|numeric|min:1|integer:'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'O campo de nome não pode ser deixado em branco',
            'name.max' => 'O nome do livro deve ter no máximo :max caracteres',
            'quantidadeCapitulos.required' => 'O campo quantidade de capítulos não pode ser deixado em branco',
            'quantidadeCapitulos.numeric' => 'A quantidade de capítulos deve ser um número',
            'quantidadeCapitulos.min' => 'A quantidade de capítulos deve ser no mínimo :min',
            'quantidadeCapitulos.integer' => 'A quantidade capítulos deve ser um número inteiro',
            'codigoCategoria.required' => 'O campo código da categoria não pode ser deixado em branco',
            'codigoCategoria.numeric' => 'O campo código da categoria deve ser um número',
            'codigoCategoria.min' => 'O código da categoria deve ser no mínimo :min',
            'codigoCategoria.integer' => 'O código da categoria deve ser um número inteiro'
        ];
    }

}
