<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSaunaRequest extends FormRequest
{
    public function authorize(): true
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id' => 'required|exists:saunas,id',
            'description' => 'nullable|string',
            'images' => 'nullable|array',
            'images.*' => 'string',
        ];
    }
}
