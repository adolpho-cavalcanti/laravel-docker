<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function get() {
        $categories = Category::get();
        $users = User::with('category')->paginate(5);

        return view('dashboard', compact('users', 'categories'));
    }

    public function criar(Request $request) {

        $user_pass_bcrypt = bcrypt($request['password']);
        User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => $user_pass_bcrypt,
                'category_id' => $request['category'],
            ]);

        return redirect('dashboard')->with('success','Usuário criado com sucesso!');

    }

    public function getEditar($id) {
        $categories = Category::get();
        $user = User::find($id);

        return view('people', compact('user', 'categories'));
    }

    public function setEditar(Request $request) {

        $user_id = $request['user_id'];
        $user_pass_bcrypt = bcrypt($request['password']);

        User::where('id', $user_id)
            ->update([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' =>  $user_pass_bcrypt,
                'category_id' => $request['category'],
            ]);

        return redirect('dashboard')->with('success','Dados do usuário atualizado com sucesso!');

    }

    public function excluir(Request $request) {
        $user_id = $request['user_id'];

        User::where('id', $user_id)->delete();

            return redirect('dashboard')->with('success','Dados do usuário excluído com sucesso!');
    }

}
