<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CategoriaLivroRequest extends FormRequest
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
            'name' => 'required|max:256',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'O campo de nome não pode ser deixado em branco',
            'name.max' => 'O nome da categoria deve ter no máximo :max caracteres',
        ];
    }

}
