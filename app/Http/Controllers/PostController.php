<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
