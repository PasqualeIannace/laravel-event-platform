<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEventRequest extends FormRequest
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
            "name" => ["required", "min:5", "max:50"],
            "location" => ["required", "min:5", "max:300"],
            "image" => ["required", "min:5", "max:300"],
            "date" => ["required", "min:5", "max:10"],
            "tickets" => ["required", "min:1", "max:5"],
            "tags" => []
        ];
    }
}
