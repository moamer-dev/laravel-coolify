<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PathUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'learning_paths' => [
                'nullable', // Allow empty or missing learning_paths field
                'array',    // Ensure it's an array if provided
            ],
            'learning_paths.*' => [
                'exists:learning_paths,id', // Ensure each provided ID exists
            ],
        ];
    }
}
