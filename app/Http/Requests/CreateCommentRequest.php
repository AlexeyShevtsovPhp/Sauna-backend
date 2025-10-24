<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCommentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * @return array<string, string>
     */
    public function rules(): array
    {
        return [
            'comment' => 'required|string|max:500',
            'sauna_id' => 'required|integer|exists:saunas,id',
        ];
    }
}
