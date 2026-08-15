<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function register()
    {
        return view('students.register');
    }

    public function register_data(Request $request)
    {
        // $data = $request->all();
        // dd($request->all());
        // $name = $request->input('name', 'dddddddd');
        $name = $request->name;
        $email = $request->email;
        $phone = $request->phone;
        $collage = $request->collage;
        $gba = $request->gba;

        // dd($request->all());

        return view('students.register_data', compact('name', 'email', 'phone', 'collage', 'gba'));
    }
}
