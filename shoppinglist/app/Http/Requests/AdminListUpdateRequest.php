<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminListUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'user_id' => 'required|integer',
            'name' => 'required|string|min:3|max:255',
            'winkel_id' => 'required|integer|min:1|max:5',
            'text' => 'required|string|min:1|max:255',
            'day' => 'required|integer|min:1|max:7'
        ];
    }
}
