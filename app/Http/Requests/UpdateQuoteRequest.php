<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateQuoteRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'author' => 'required|min:5|' . Rule::unique('quotes')->ignore($this->quote),
            'text' => 'required|min:10',
        ];
    }

    public function messages()
    {
        return [
            'author.required' => 'Author wajib diisi.',
            'author.unique' => 'Author sudah dipakai.',
            'text.required' => 'Text wajib diisi',
        ];
    }
}