<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): AnonymousResourceCollection
    {
        return PostResource::collection(Post::query()->latest('id')->paginate(20))
            ->additional(['message' => 'Posts retrieved successfully.']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'title_en' => ['required', 'string', 'max:255'],
            'title_ar' => ['required', 'string', 'max:255'],
            'content_en' => ['nullable', 'string'],
            'content_ar' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'mimes:png,jpg,jpeg', 'max:2048'],
        ]);

        $post = Post::create([
            'title' => [
                'en' => $validated['title_en'],
                'ar' => $validated['title_ar'],
            ],
            'image' => $request->file('image')?->store('uploads/images'),
            'content' => [
                'en' => $validated['content_en'] ?? null,
                'ar' => $validated['content_ar'] ?? null,
            ],
        ]);

        return (new PostResource($post))
            ->additional(['message' => 'Post created successfully.'])
            ->response()
            ->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post): JsonResponse
    {
        return (new PostResource($post))
            ->additional(['message' => 'Post retrieved successfully.'])
            ->response();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post): JsonResponse
    {
        $validated = $request->validate([
            'title_en' => ['required', 'string', 'max:255'],
            'title_ar' => ['required', 'string', 'max:255'],
            'content_en' => ['nullable', 'string'],
            'content_ar' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'mimes:png,jpg,jpeg', 'max:2048'],
        ]);

        $previousImage = $post->image;
        $path = $request->file('image')?->store('uploads/images') ?? $previousImage;

        $post->update([
            'title' => [
                'en' => $validated['title_en'],
                'ar' => $validated['title_ar'],
            ],
            'image' => $path,
            'content' => [
                'en' => $validated['content_en'] ?? null,
                'ar' => $validated['content_ar'] ?? null,
            ],
        ]);

        if ($request->hasFile('image') && $previousImage !== null) {
            Storage::delete($previousImage);
        }

        return (new PostResource($post->refresh()))
            ->additional(['message' => 'Post updated successfully.'])
            ->response();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post): JsonResponse
    {
        if ($post->image !== null) {
            Storage::delete($post->image);
        }

        $post->delete();

        return response()->json(['message' => 'Post deleted successfully.']);
    }
}
