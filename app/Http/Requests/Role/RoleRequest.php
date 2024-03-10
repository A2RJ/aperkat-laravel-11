<?php

namespace App\Http\Requests\Role;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
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
            'role' => 'required|string',
            'parent_id' => 'required|exists:roles,id',
            'user_id' => 'required|exists:users,id'
        ];
    }

    /**
     * @return array|string[]
     */
    public function messages(): array
    {
        return [
            'parent_id' => 'Supervisor is invalid',
            'user_id' => 'User is invalid',
        ];
    }
}
