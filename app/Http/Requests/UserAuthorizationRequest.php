<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UserAuthorizationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     *
     * @return array<string, ValidationRule|array|string>
     */

    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'password' => 'required|string',
        ];
    }

    /**
     *
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Логин обязателен для заполнения',
            'password.required' => 'Пароль обязателен для заполнения',
        ];
    }
}
