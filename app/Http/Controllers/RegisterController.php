<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register'); // a tela de cadastro
    }

    public function create(Request $request)
    {
        // validação simples
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // verifica se já existe
        $existe = DB::table('users')
            ->where('email', $request->email)
            ->first();

        if ($existe) {
            return back()->with('erro', 'Este email já está cadastrado.');
        }

        // cria o usuário
        $id = DB::table('users')->insertGetId([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // cria sessão automática após cadastro
        session([
            'usuario_id' => $id,
            'usuario_nome' => $request->name
        ]);

        return redirect('/dashboard');
    }
}
