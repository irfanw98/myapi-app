<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'      => 'required|min:3',
            'email'     => 'required|email|unique:users,email',
            'password'  => 'required|min:3',
            'role'      => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'nama wajib diisi.',
            'name.min' => 'nama minimal 3 karakter',
            'email.required' => 'email wajib diisi.',
            'email.email' => 'yang anda inputkan bukan email',
            'email.unique' => 'email sudah digunakan',
            'password.required' => 'password wajib diisi.',
            'password.min' => 'password minimal 3 karakter',
            'role.required' => 'role wajib diisi.'
        ];
    }
}
