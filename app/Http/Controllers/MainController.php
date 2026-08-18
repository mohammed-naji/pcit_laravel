<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MainController extends Controller
{
    public function index()
    {
        // $categories = Category::all();
        // SELECT * FROM categories

        // $latest_products = Product::orderBy('id', 'desc')->limit(10)->get();
        // SELECT * FROM products ORDER BY id DESC LIMIT 10

        return 'Homepage from Controller';
    }

    public function about()
    {
        return 'About Us from Controller';
    }

    public function meals($name)
    {
        return 'meals page | ' . $name;
        // return view('meals');
    }

    public function posts()
    {
        // $name = "ahmed maher";
        // $age = 19;

        // return view('posts.index')->with('myname', $name);
        // return view('posts.index', [
        //     'name' => $name,
        //     'age' => $age
        // ]);

        // var_dump(compact('name', 'age'));
        // die;
        // dd(compact('name', 'age'));

        // return view('posts.index', compact('name', 'age'));

        $posts = [
            [
                'id' => 1,
                'title' => 'Real Madrid',
                'content' => 'lorem1'
            ],
            [
                'id' => 2,
                'title' => 'Barcelona',
                'content' => 'lorem2'
            ],
            [
                'id' => 3,
                'title' => 'Liverpool',
                'content' => 'lorem3'
            ],
            [
                'id' => 4,
                'title' => 'AC Milan',
                'content' => 'lorem4'
            ],
        ];

        // dd($posts);
        // $posts = Post::all();

        return view('posts.index', compact('posts'));
    }

    public function edit_user($id)
    {
        return view('edit_user', compact('id'));
    }

    public function edit_user_data(Request $request, $id)
    {
        dd($id);
    }

    public function contact()
    {
        return view('contact');
    }

    public function contact_data(Request $request)
    {
        // dd($request->all());
        Mail::to('mali.hajjaj2005@gmail.com')->send(new TestMail($request->all()));

        return "Email Sent";
    }
}
