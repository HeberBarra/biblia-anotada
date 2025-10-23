<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UserLoginRequest extends FormRequest
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
            'username-login' => 'required',
            'password-login' => 'required|min:8|max:32',
        ];
    }

    public function messages(): array
    {
        return [
            'username-login.required' => 'O campo de nome de usuário é obrigatório.',
            'password-login.required' => 'O campo de senha é obrigatório.',
            'password-login.min' => 'A senha precisa ter no mínimo :min caracteres.',
            'password-login.max' => 'A senha pode ter no máximo :max caracteres.',
        ];
    }
}
