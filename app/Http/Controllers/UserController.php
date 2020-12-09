<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;



class UserController extends Controller
{
    public function index() {
        $users = User::get();
        return response()->json($users,200);
    }

    public function show($id) {
        $user = User::where('id',$id)->findOrFail($id);
        return response()->json($user,200);
    }
}