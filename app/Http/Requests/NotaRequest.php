<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class NotaRequest extends FormRequest
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
            'name' => 'required|max:30',
            'chapter-number' => 'required|numeric|min:1|integer',
            'note-text' => 'required|max:256',
            'user-id' => 'required|numeric|integer',
            'book-id' => 'required|numeric|integer'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'O campo de nome não pode ser deixado em branco',
            'name.max' => 'O nome do livro deve ter no máximo :max caracteres',
            'chapter-number.required' => 'O campo número do capítulo não pode ser deixado em branco',
            'chapter-number.integer' => 'O campo número do capítulo deve ser um valor inteiro',
            'chapter-number.min' => 'O campo número do capítulo não pode ter um valor menor do que :min',
            'chapter-number.numeric' => 'O campo número do capítulo deve ser um número',
            'note-text.max' => 'O tamanho do texto da nota não pode ser maior do que :max caracteres',
            'note-text.required' => 'O texto da nota não pode ser deixado em branco',
            'user-id.required' => 'O campo de código do usuário não pode ser deixado em branco',
            'user-id.numeric' => 'O campo de código do usuário precisa ser um número',
            'user-id.integer' => 'O campo de código do usuário precisa ser um valor inteiro',
            'book-id.required' => 'O campo de código do livro não pode ser deixado em branco',
            'book-id.numeric' => 'O campo de código do livro precisa ser um número',
            'book-id.integer' => 'O campo de código do livro precisa ser um valor inteiro'
        ];
    }


}
