<?php

namespace App\Http\Requests\Ppuf;

use Illuminate\Foundation\Http\FormRequest;

class ImportRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'role_id' => 'required|exists:roles,id',
            'period' => 'required|numeric',
            'file' => 'required|file|mimes:xlsx',
            'sheet_number' => 'required|numeric',
        ];
    }

    /**
     * @return array|string[]
     */
    public function messages(): array
    {
        return [
            'role_id' => 'Role is invalid',
        ];
    }
}
