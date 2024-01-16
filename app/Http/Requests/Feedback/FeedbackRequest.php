<?php

namespace App\Http\Requests\Feedback;

use Illuminate\Foundation\Http\FormRequest;

class FeedbackRequest extends FormRequest
{
    public function rules(): array {
        return [
            'name' => 'required|max:255',
            'phone' => 'required|numeric',
            'message' => 'required|min:10|max:1000',
        ];
    }
}
