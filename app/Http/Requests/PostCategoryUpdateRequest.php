<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\PostCategoryStoreRequest;
use phpDocumentor\Reflection\Types\Parent_;

class PostCategoryUpdateRequest extends PostCategoryStoreRequest
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
        $rules = parent::rules();
        $rules['slug'] = 'required|max:255|unique:post_categories,slug,' . $this->id;
        return $rules;
    }
}
