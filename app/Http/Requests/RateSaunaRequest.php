<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class RateSaunaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'sauna_id' => 'required|integer|exists:saunas,id',
            'rating' => 'required|integer|min:1|max:5',
        ];
    }

    public function messages(): array
    {
        return [
        ];
    }
}
