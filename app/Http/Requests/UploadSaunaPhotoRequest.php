<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadSaunaPhotoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'photo' => 'required|file|image|mimes:jpg,jpeg,png,gif|max:5120',
            'sauna_id' => 'required|integer|exists:saunas,id',
        ];
    }

    public function messages(): array
    {
        return [
            'photo.required' => 'Файл обязателен для загрузки.',
            'photo.image' => 'Файл должен быть изображением.',
            'photo.mimes' => 'Допустимые форматы: JPG, JPEG, PNG, GIF.',
            'photo.max' => 'Максимальный размер файла — 5 МБ.',
            'sauna_id.required' => 'ID сауны обязателен.',
            'sauna_id.integer' => 'ID сауны должен быть числом.',
            'sauna_id.exists' => 'Сауна с таким ID не найдена.',
        ];
    }
}
