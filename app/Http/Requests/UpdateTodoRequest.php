<?php

namespace App\Http\Requests;

use App\Enums\TodoStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTodoRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title'  => ['sometimes', 'max:255'],
            'status' => [Rule::enum(TodoStatus::class)]
        ];
    }
}
