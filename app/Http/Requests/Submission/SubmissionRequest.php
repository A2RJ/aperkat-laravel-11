<?php

namespace App\Http\Requests\Submission;

use Illuminate\Foundation\Http\FormRequest;

class SubmissionRequest extends FormRequest
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
            'ppuf_id' => 'required|exists:ppufs,id',
            'iku1_id' => 'required|exists:iku1,id',
            'iku2_id' => 'required|exists:iku2,id',
            'iku3_id' => 'required|exists:iku3,id',
            'background' => 'required',
            'speaker' => 'required',
            'participant' => 'required',
            'rundown' => 'required',
            'place' => 'required',
            'date' => 'required',
            'budget' => 'required',
            'vendor' => 'required'
        ];
    }

    /**
     * @return array|string[]
     */
    public function messages(): array
    {
        return [
            'ppuf_id' => 'PPUF is invalid',
            'iku1_id' => 'IKU is invalid',
            'iku2_id' => 'IKU is invalid',
            'iku3_id' => 'IKU is invalid',
        ];
    }
}
