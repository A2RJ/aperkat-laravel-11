<?php

namespace App\Http\Requests\Ppuf;

use Illuminate\Foundation\Http\FormRequest;

class PpufRequest extends FormRequest
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
            'ppuf_number' => 'required',
            'period' => 'required',
            'iku' => 'required',
            'activity_type' => 'required|in:program,pengadaan,pemeliharaan,pengembangan',
            'program_name' => 'required',
            'description' => 'required',
            'place' => 'required',
            'date' => 'required|in:januari,februari,maret,april,mei,juni,juli,agustus,september,oktober,november,desember',
            'budget' => 'required',
            'detail' => 'nullable',
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
