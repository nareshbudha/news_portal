<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'summary' => 'required|string|max:500',
            'author_id' => 'required|exists:authors,id',
            'post_category_id' => 'required|exists:post_categories,id',
            'status' => 'required|in:draft,published',
            'is_featured' => 'required',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    // public function messages()
    // {
    //     return [
    //         'title.required' => 'The title is required.',
    //         'content.required' => 'The content is required.',
    //         'summary.required' => 'The summary is required.',
    //         // 'author_id.required' => 'Please select an author.',
    //         // 'post_category_id.required' => 'Please select a category.',
    //         // 'status.required' => 'Please select a status.',
    //         // 'status.in' => 'The status must be either Draft (0) or Published (1).',
    //         'featured_image.image' => 'Featured image must be an image file.',
    //         'images.*.image' => 'Each image must be an image file.',
    //         'featured_image.mimes' => 'Featured image must be a file of type: jpeg, png, jpg, gif.',
    //         'images.*.mimes' => 'Each image must be a file of type: jpeg, png, jpg, gif.',
    //         'featured_image.max' => 'Featured image must not be greater than 2MB.',
    //         'images.*.max' => 'Each image must not be greater than 2MB.',
    //     ];
    // }
}
