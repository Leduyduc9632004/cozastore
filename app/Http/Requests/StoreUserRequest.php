<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
                'name' => 'required|max:50|string',
                'email' => 'required|string|email|unique:users',
                'address' => 'required|string',
                'phone' => 'required|unique:users',
                'username' => 'required|string|unique:users',
                'password' => 'required|string|min:10',
        ];
    }
}
