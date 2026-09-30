<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('id', '!=', Auth::id())->paginate(10);
        $roles = Role::all();

        return view('dashboard.users', compact('users', 'roles'));
    }

    public function role(Request $request)
    {
        $user = User::find($request->userId);
        // dd($request->all());
        $user->syncRoles([]);
        $user->assignRole($request->role);
    }
}
