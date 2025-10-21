<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UserRegistrationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, ValidationRule|array|string>
     */

    public function rules(): array
    {
        return [
            'name' => 'required|string|unique:users',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string',
        ];
    }

    /**
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Логин обязателен для заполнения',
            'name.unique' => 'Данный указанный логин уже занят',
            'email' => 'Некорректный email',
            'email.unique' => 'данный указанный email уже занят',
            'password.required' => 'Пароль обязателен для заполнения',
        ];
    }
}
