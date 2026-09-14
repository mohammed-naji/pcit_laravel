<?php

namespace App\Http\Controllers;

use App\Models\Identity;
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
        // dd($users);

        return view('users.index', compact('users'));
    }

    public function identity(Request $request)
    {
        $id = null;
        if ($request->has('id_num') && !empty($request->id_num)) {
            $id = Identity::with('user')->where('id_num', $request->id_num)->firstOrFail();
        }

        return view('users.identity', compact('id'));
    }

    public function identity_check($id)
    {
        $ids = Identity::with('user')->where('id_num', 'like', $id . '%')->get();

        return $ids;
    }
}
