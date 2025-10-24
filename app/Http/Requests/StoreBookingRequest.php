<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreBookingRequest extends FormRequest
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
            'bookings' => 'required|array|min:1',
            'bookings.*.sauna_id' => 'required|integer|exists:saunas,id',
            'bookings.*.start_time' => 'required|date_format:Y-m-d H:i:s',
            'bookings.*.end_time' => 'required|date_format:Y-m-d H:i:s|after:bookings.*.start_time',
            'bookings.*.blocked' => 'required|bool',
        ];
    }

    /**
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'bookings.required' => 'Данные для бронирования обязательны.',
            'bookings.array' => 'Данные бронирования должны быть массивом.',
            'bookings.min' => 'Должен быть хотя бы один элемент бронирования.',
            'bookings.*.sauna_id.required' => 'Отсутствует ID сауны.',
            'bookings.*.user_id.required' => 'Отсутствует ID пользователя.',
        ];
    }
}
