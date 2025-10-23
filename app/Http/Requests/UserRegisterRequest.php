<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UserRegisterRequest extends FormRequest
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
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|max:32|confirmed',
            'password_confirmation' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'username.required' => 'O campo de nome de usuário é obrigatório.',
            'email.required' => 'O campo de e-mail é obrigatório.',
            'email.email' => 'O campo de e-mail deve conter um endereço de e-mail válido',
            'password.confirmed' => 'As senhas não batem',
            'password.required' => 'O campo de senha é obrigatório.',
            'password.min' => 'A senha precisa ter no mínimo :min caracteres.',
            'password.max' => 'A senha pode ter no máximo :max caracteres.',
            'password_confirmation.required' => 'O campo de confirmação de senha é obrigatório.',
        ];
    }
}
