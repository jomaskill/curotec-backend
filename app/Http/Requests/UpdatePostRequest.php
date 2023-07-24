<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title'   => ['sometimes', 'max:255'],
            'body'    => ['sometimes'],
        ];
    }
}
