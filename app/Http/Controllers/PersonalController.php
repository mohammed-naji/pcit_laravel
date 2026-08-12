<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonalController extends Controller
{
    public function index()
    {
        return view('personal.index');
    }

    public function resume()
    {
        return view('personal.resume');
    }

    public function projects()
    {
        // $projects = Project::all();
        // SELECT * FROM projects =>
        // [
        //     [],
        //     [],
        //     [],
        //     [],
        // ]

        $projects = [
            [
                'id' => 1,
                'name' => 'Project 1',
                'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius at enim eum illum aperiam placeat esse? Mollitia omnis minima saepe recusandae libero, iste ad asperiores! Explicabo commodi quo itaque! Ipsam!',
                'image' => 'https://images.unsplash.com/photo-1786374227616-3f8a323cb9d7?q=80&w=687&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'
            ],
            [
                'id' => 2,
                'name' => 'Project 2',
                'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius at enim eum illum aperiam placeat esse? Mollitia omnis minima saepe recusandae libero, iste ad asperiores! Explicabo commodi quo itaque! Ipsam!',
                'image' => 'https://images.unsplash.com/photo-1786344070709-7e4e486f6c74?q=80&w=687&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'
            ],
            [
                'id' => 3,
                'name' => 'Project 3',
                'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius at enim eum illum aperiam placeat esse? Mollitia omnis minima saepe recusandae libero, iste ad asperiores! Explicabo commodi quo itaque! Ipsam!',
                'image' => 'https://images.unsplash.com/photo-1786276787903-185b1838d267?q=80&w=687&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'
            ],
        ];

        return view('personal.projects', compact('projects'));
    }

    public function contact()
    {
        return view('personal.contact');
    }

    public function contact_data()
    {
        return 'DDDDDD';
    }
}
