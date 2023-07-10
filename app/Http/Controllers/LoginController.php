<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    //

    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {


        // Validacion
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (!auth()->attempt($request->only('email', 'password'), $request->remember)) {
            return back()->with('mensaje', 'campos incorrectos');
        }
        return redirect()->route('posts.index', auth()->user()->username);
    }
}
