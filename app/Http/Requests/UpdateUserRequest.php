<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
        $userId = $this->route('user.id');
        return [
            'name' => 'required|max:50|string',
            // 'email' => ['required','string','email',Rule::unique('users')->ignore($userId)],
            'email' => 'required|string|unique:users,email,'.$userId,
            'address' => 'required|string',
            'phone' => 'required|unique:users,phone,'.$userId,
            'username' => 'required|string|unique:users,username,'.$userId,
            'password' => 'required|string|min:10',
        ];
    }
}
