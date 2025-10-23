<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UserAdminUpdateRequest extends FormRequest
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
            'admin' => 'nullable',
            'username' => 'required',
            'email' => 'required|email',
            'new_password' => 'nullable|min:8|max:32|confirmed',
            'new_password_confirmation' => 'nullable'
        ];
    }

    public function messages(): array
    {
        return [
            'username.required' => 'O campo de nome de usuário não pode ser deixado em branco',
            'email.required' => 'O campo de e-mail não pode ser ser deixado em branco',
            'email.email' => 'O campo de e-mail deve conter um e-mail válido',
            'new-password.confirmed' => 'As novas senhas não batem',
            'new-password.min' => 'A nova senha precisa ter no mínimo :min caracteres',
            'new-password.max' => 'A nova senha precisa ter no máximo :max caracteres',
        ];
    }

}
