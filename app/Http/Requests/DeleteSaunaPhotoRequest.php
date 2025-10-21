<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeleteSaunaPhotoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'saunaId'   => 'required|integer|exists:saunas,id',
            'photoUrl'  => 'required|string',
        ];
    }

    public function messages(): array
    {
        return [
            'saunaId.required'  => 'ID сауны обязателен.',
            'saunaId.integer'   => 'ID сауны должен быть числом.',
            'saunaId.exists'    => 'Сауна с таким ID не найдена.',
            'photoUrl.required' => 'URL фото обязателен.',
        ];
    }
}
