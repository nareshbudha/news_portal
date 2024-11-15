<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormStoreRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:forms,email',
            'password' => 'required|string|min:8',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|string',
            'status' => 'required|boolean',
            'is_true' => 'required|boolean',
            'start_date' => 'required|date',
            'name1' => 'required|string|max:255',
            'email1' => 'required|email|max:255|unique:forms,email1',
            'password1' => 'required|string|min:8',
            'image1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description1' => 'required|string',
            'status1' => 'required|boolean',
            'is_true1' => 'required|boolean',
            'start_date1' => 'required|date',

        ];
    }
}
