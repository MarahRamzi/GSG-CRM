<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
            'name' => 'required|string|min:3',
            'age' => 'required|numeric|between:18,40',
            'email' => 'required|unique:customers|email',
            'phone' => 'required|max:10',
            'address' => 'nullable|string',
            'career' => 'nullable|string',
        ];
    }
}