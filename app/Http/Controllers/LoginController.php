<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
{
    $credenciais = [
        'email' => $request->email,
        'password' => $request->password
    ];

    if (Auth::attempt($credenciais)) {

        session(['usuario_id' => Auth::id()]);

        return redirect()->route('products.index');
    }

    return back()->with('erro', 'Email ou senha incorretos.');
}


    public function dashboard()
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        return redirect()->route('products.index');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    public function register()
    {
        return view('register');
    }

    public function registerUser(Request $request)
    {
        User::create([
            'name'       => $request->name,
            'email'      => $request->email,
            'password'   => Hash::make($request->password),
        ]);

        return redirect('/login')->with('success', 'Usuário criado com sucesso!');
    }
}
