<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RefreshHeaderRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'avatar' => 'required|image|max:2048',
        ];
    }

    /**
     * @return array
     */
    public function messages(): array
    {
        return [];
    }
}
