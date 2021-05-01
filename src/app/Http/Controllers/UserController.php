<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function get() {
        $users = User::with('category')->get();
        // dd($users);
        return view('dashboard', compact('users'));
    }

    public function criar(Request $request) {
        dd($request);
    }

    public function getEditar($id) {
        $user = User::find($id);
        return view('people', compact('user'));
    }
}
