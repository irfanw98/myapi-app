<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'      => 'required|min:3',
            'email'     => 'required|email|'. Rule::unique('users')->ignore($this->user),
            'password'  => 'required|min:3',
            'role'      => 'required'
        ];
    }
}