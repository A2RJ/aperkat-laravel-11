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
            // 'budget' => 'required',
            'vendor' => 'required',
            'nama_item.*' => 'required|string',
            'qty.*' => 'required|integer|min:1',
            'harga_satuan.*' => 'required|integer|min:1',
            'harga_total.*' => 'required|integer|min:1',
            'keterangan.*' => 'nullable|string',
        ];
    }

    /**
     * @return array|string[]
     */
    public function messages(): array
    {
        return [
            'ppuf_id' => 'Pilih PPUF',
            'iku1_id' => 'Pilih IKU',
            'iku2_id' => 'Pilih IKU',
            'iku3_id' => 'Pilih IKU',
            'nama_item.*.required' => 'Nama item harus diisi.',
            'nama_item.*.string' => 'Format nama item tidak valid.',
            'qty.*.required' => 'Qty harus diisi.',
            'qty.*.integer' => 'Qty harus berupa bilangan bulat.',
            'qty.*.min' => 'Qty harus lebih besar dari 0.',
            'harga_satuan.*.required' => 'Harga satuan harus diisi.',
            'harga_satuan.*.integer' => 'Harga satuan harus berupa bilangan bulat.',
            'harga_satuan.*.min' => 'Harga satuan harus lebih besar dari 0.',
            'harga_total.*.required' => 'Harga total harus diisi.',
            'harga_total.*.integer' => 'Harga total harus berupa bilangan bulat.',
            'harga_total.*.min' => 'Harga total harus lebih besar dari 0.',
            'keterangan.*.string' => 'Format keterangan tidak valid.',
        ];
    }
}
