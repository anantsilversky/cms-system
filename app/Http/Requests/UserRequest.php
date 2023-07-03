<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z ]+$/'],
            'username' => ['required', 'string', 'max:255', Rule::unique('users')->ignore(Auth::user()->id)],
            'email' => ['required', 'email', Rule::unique('users')->ignore(Auth::user()->id)],
            'age' => ['required', 'integer', 'min:18'],
            'password' => ['confirmed'],
            'image' => ['mimes:jpg, jpeg, png']
        ];
    }
}
