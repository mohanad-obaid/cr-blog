<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        //handeled by auth:sanctum middleware
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // make all of the fields required, set featured image to accept only images
        return [
            'title' => 'required|string|min:3|max:250',
            'content' => 'required|string|min:3|max:6000',
            'featured_image' => 'required|image|max:1024|mimes:jpg,jpeg,png',
        ];
    }
}
