<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function all_users()
    {
        // $users = [
        //     [1, 'Ahmed Ali', 'aali@gmail.com', 1234567889],
        //     [1, 'Ahmed Ali', 'aali@gmail.com', 1234567889],
        //     [1, 'Ahmed Ali', 'aali@gmail.com', 1234567889],
        //     [1, 'Ahmed Ali', 'aali@gmail.com', 1234567889],
        //     [1, 'Ahmed Ali', 'aali@gmail.com', 1234567889],
        //     [1, 'Ahmed Ali', 'aali@gmail.com', 1234567889],
        //     [1, 'Ahmed Ali', 'aali@gmail.com', 1234567889],
        // ];

        // $dev_name = "Mohammed Naji";

        // return view('users.all_users', compact('dev_name', 'users'));

        // $users = User::all();
        $users = User::with('identity')->get();

        return view('users.index', compact('users'));
    }
}
