<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreQuoteRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'author' => 'required|min:5|unique:quotes',
            'text' => 'required|min:10'
        ];
    }

    public function messages()
    {
        return [
            'author.required' => 'Penulis wajib diisi.',
            'author.unique' => 'Penulis sudah dipakai.',
            'author.min' => 'Penulis minimal 5 karakter.',
            'text.required' => 'Text wajib diisi.',
            'text.min' => 'Text minimal 10 karakter'
        ];
    }
}