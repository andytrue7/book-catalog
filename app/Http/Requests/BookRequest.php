<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{

    public function rules()
    {
        return [
            'title' => 'required|string',
            'author' => 'required|string',
            'desc' => 'required|string',
            'image' => 'required'
        ];
    }
}
