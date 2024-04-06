<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends ApiRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'surname' => 'string|min:2|max:32',
            'name' => 'string|min:2|max:32',
            'patronymic' => 'nullable|string|min:2|max:32',
            'login' => 'string|min:3|max:32|unique:users,login',
            'password' => 'string|min:3|max:32',
            'role_id' => 'integer|exists:roles,id',
        ];
    }
}
