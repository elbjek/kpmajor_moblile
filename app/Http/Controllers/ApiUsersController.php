<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class ApiUsersController extends Controller
{

    public function show()
    {
        $user = \Auth::id();
        $users = User::where('id', $user)->get();
        return response()->json($users);
    }
}