<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
// Use the Post Model
use App\Models\Post;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Get the 'id' parameter from the URL
        $post_id = $this->route('post');
        // Get the post data
        $post = Post::find($post_id);
        // Check if the post exists and if the current user ID matches the post's user ID
        return $post && auth()->check() && auth()->user()->id === $post->user_id;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|min:3|max:250',
            'content' => 'required|string|min:3|max:6000',
            'featured_image' => 'nullable|image|max:1024|mimes:jpg,jpeg,png',
        ];
    }
}
