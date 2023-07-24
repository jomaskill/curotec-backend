<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePostRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title'   => ['required', 'max:255'],
            'body'    => ['required'],
            'user_id' => ['required', Rule::exists('users', 'id')]
        ];
    }
}
