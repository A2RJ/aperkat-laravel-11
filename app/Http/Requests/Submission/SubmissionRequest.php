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
            'background' => 'required',
            'participant' => 'required',
            'place' => 'required',
            'date' => 'required',
            'speaker' => 'required',
            'rundown' => 'required',
            'budget' => 'required',
            'vendor' => 'required'
        ];
    }
}
