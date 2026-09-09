<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $posts = Post::all();
        // $posts = Post::get();
        // $posts = Post::orderBy('id', 'desc')->get();
        $posts = Post::orderBy('id', 'desc')->paginate(20);
        // $posts = Post::orderBy('id', 'desc')->simplePaginate(20);

        // SELECT * FROM posts LIMIT 20 OFFSET 60 ORDER BY id DESC;

        // SELECT * FROM posts ORDER BY id DESC;

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //1. validation
        $request->validate([
            'title' => 'required',
            'image' => 'nullable|image|mimes:png,jpg,jpeg'
        ]);

        //2. store file
        $path = null;
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('uploads/images');
        }

        //3. store in database
        Post::create([
            'title' => $request->title,
            'image' => $path,
            'content' => $request->content,
        ]);

        flash()->success('Post created successfully!');

        //4. redirect to another page
        return redirect(route('posts.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        // SELECT * FROM posts WHERE id = 3
        // $post = Post::findOrFail($id);

        // dd($post);
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //1. validation
        $request->validate([
            'title' => 'required',
            'image' => 'nullable|image|mimes:png,jpg,jpeg'
        ]);

        //2. store file
        $path = $post->image;
        if ($request->hasFile('image')) {
            File::delete($post->image);
            $path = $request->file('image')->store('uploads/images');
        }

        //3. store in database
        $post->update([
            'title' => $request->title,
            'image' => $path,
            'content' => $request->content,
        ]);

        flash()->warning('Post updated successfully!');

        //4. redirect to another page
        return redirect(route('posts.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        // dd('Deleted');
        // DELETE FROM posts WHERE id = 10;
        // $post->destroy();
        File::delete($post->image);
        $post->delete();
        flash()->info('Post deleted successfully!');
        return redirect(route('posts.index'));
    }
}
