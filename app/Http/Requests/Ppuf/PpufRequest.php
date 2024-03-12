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
            'role_id' => 'required|exists:users,id',
            'ppuf_number' => 'required',
            'iku_1' => 'required|exists:iku1,id',
            'iku_2' => 'required|exists:iku2,id',
            'iku_3' => 'required|exists:iku3,id',
            'activity_type' => 'required|in:program,pengadaan,perawatan,pengembangan',
            'program_name' => 'required',
            'description' => 'required',
            'execution_location' => 'required',
            'execution_time' => 'required|in:januari,februari,maret,april,mei,juni,juli,agustus,september,oktober,november,desember',
            'planned_expenditure' => 'required',
            'detail' => 'nullable',
        ];
    }
}
