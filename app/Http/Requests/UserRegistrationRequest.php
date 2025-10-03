<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UserRegistrationRequest extends FormRequest
{
    /**
     * Разрешаем всем делать этот запрос (можно поставить логику авторизации, если нужно)
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Правила валидации для авторизации
     * Обычно это email и пароль
     *
     * @return array<string, ValidationRule|array<mixed>|string>
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
     * Кастомные сообщения об ошибках
     *
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Логин обязателен для заполнения',
            'name.unique' => 'Данный указанный логин уже занят',
            'email' => 'email обязателен для заполнения',
            'email.unique' => 'данный указанный email уже занят',
            'password.required' => 'Пароль обязателен для заполнения',
        ];
    }
}
