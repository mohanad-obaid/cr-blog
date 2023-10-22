<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;
// Use the Post Model
use App\Models\Post;
// We will use Form Request to validate incoming requests from our store and update method
use App\Http\Requests\Post\StoreRequest;
use App\Http\Requests\Post\UpdateRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        // Set the number of posts to display per page. You can change this to your desired value.
        $perPage = $request->input('per_page', 10); // Default: 10 posts per page

        // Retrieve paginated posts from the database
        $query = Post::query();

        // Sorting
        $sortColumn = $request->input('sort_column', 'created_at');
        $sortDirection = $request->input('sort_direction', 'desc');

        $query->orderBy($sortColumn, $sortDirection);

        $posts = $query->paginate($perPage);

        return response()->json($posts);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        $post = Post::find($id);
        if($post){
            return response()->json($post);
        }else{
            return response()->json(['error' => 'Post not found'], 404);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request): JsonResponse
    {
        $validated = $request->validated();

        if ($request->hasFile('featured_image')) {
             // put image in the public storage
            $filePath = Storage::disk('public')->put('images/posts/featured-images', request()->file('featured_image'));
            $validated['featured_image'] = $filePath;
        }

        //add user id to db record
        $validated['user_id'] = $request->user()->id;

        // insert only requests that already validated in the StoreRequest
        $create = Post::create($validated);

        if ($create) {
            return response()->json(['message' => 'Post created successfully'], 201);
        }

        return response()->json(['message' => 'Failed to create the post'], 500);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id): JsonResponse
    {
        $post = Post::findOrFail($id);
        $validated = $request->validated();


        if ($request->hasFile('featured_image')) {
            // delete image
            Storage::disk('public')->delete($post->featured_image);

            $filePath = Storage::disk('public')->put('images/posts/featured-images', request()->file('featured_image'), 'public');
            $validated['featured_image'] = $filePath;
        }

        $update = $post->update($validated);

        if($update) {
            return response()->json(['message' => 'Post updated successfully'], 200);
        }

        return response()->json(['message' => 'Failed to update the post'], 500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        $post = Post::find($id);
        // Check if the post exists and if the current user ID matches the post's user ID
        if($post && auth()->check() && auth()->user()->id === $post->user_id){
            //delete post image
            Storage::disk('public')->delete($post->featured_image);
        
            $delete = $post->delete($id);
    
            if($delete) {
                return response()->json(['message' => 'Post deleted successfully'], 200);
            }

            return response()->json(['message' => 'Failed to delete the post'], 500);
        }else if(!$post){
            return response()->json(['message' => 'Post not found'], 404);
        }else{
            return response()->json(['message' => 'You cant delete this post'], 403);
        }
    }
}