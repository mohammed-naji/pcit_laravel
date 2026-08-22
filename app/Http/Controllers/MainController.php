<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Mail\ContactUsMail;
use App\Mail\TestMail;
use App\Rules\WordsCount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

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

    public function upload()
    {
        return view('upload');
    }

    public function upload_data(Request $request)
    {
        // dd($request->all());
        $name = $request->name;
        $path = $request->file('image')->store('uploads/images');

        // $_FILES['image'];
        // move_uploaded_file();

        return view('uploaded_data', compact('name', 'path'));
    }

    public function contact2()
    {
        return view('contact2');
    }

    public function contact2_data(Request $request)
    {
        // dd($request->all());
        //1. validation
        //2. upload files
        //3. action => database or mail
        //4. redirect to another page

        // Upload File
        $file = $request->file('file')->store('/uploads/files');

        $data = $request->all();
        $data['file'] = $file;

        Mail::to('ahmed72ayyad@gmail.com')->send(new ContactUsMail($data));

        return 'Email Sent';
        // malqumbuz@gmail.com
    }

    public function validation()
    {
        return view('validation');
    }

    // public function validation_data(LoginRequest $request)
    public function validation_data(Request $request)
    {
        // dd($request->all());
        //1. validation
        //2. upload files
        //3. actions
        //4. redirect

        // $request->validate([
        //     // 'email' => 'required|max:30',
        //     // 'password' => 'required|min:6'
        //     'email' => ['required', 'max:30'],
        //     'password' => ['required', 'min:6']
        // ]);

        // dd($request->validated());

        // Validation Type
        //1. Request Validate
        //2. File Request
        //3. Validator Class

        // $validator = Validator::make($request->all(), [
        //     'email' => ['required', 'max:30'],
        //     'password' => ['required', 'min:6']
        // ]);

        // if ($validator->fails()) {
        //     return redirect()
        //         ->back()
        //         ->withErrors($validator)
        //         ->withInput();
        // }

        $request->validate([
            'email' => 'required',
            'password' => 'required',
            'bio' => ['required', new WordsCount(9)]
        ]);

        dd($request->all());
    }
}
