<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class GetBookingByDateRequest extends FormRequest
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
            'date' => 'required|date_format:Y-m-d',
        ];
    }

    public function messages(): array
    {
        return [
            'date.required' => 'Дата обязательна',
            'date.date_format' => 'Дата должна быть в формате ГГГГ-ММ-ДД',
        ];
    }
}
