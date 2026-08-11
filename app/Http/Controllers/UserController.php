<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function all_users()
    {
        $users = [
            [1, 'Ahmed Ali', 'aali@gmail.com', 1234567889],
            [1, 'Ahmed Ali', 'aali@gmail.com', 1234567889],
            [1, 'Ahmed Ali', 'aali@gmail.com', 1234567889],
            [1, 'Ahmed Ali', 'aali@gmail.com', 1234567889],
            [1, 'Ahmed Ali', 'aali@gmail.com', 1234567889],
            [1, 'Ahmed Ali', 'aali@gmail.com', 1234567889],
            [1, 'Ahmed Ali', 'aali@gmail.com', 1234567889],
        ];

        $dev_name = "Mohammed Naji";

        return view('users.all_users', compact('dev_name', 'users'));
    }
}
