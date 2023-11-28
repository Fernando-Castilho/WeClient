<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        if(auth::check()){
            return redirect()->route("admin.index")->send();
        }
        return view("login");
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();
        if(!Auth::attempt($credentials)){
            return redirect()->route("login.index")->withErrors(["erro" => "Email ou senha inválidas!"]);
        }

        return redirect()->route("admin.index");
    }

    public function logout()
    {
        auth::logout();
        return redirect()->route("login.index");
    }
}
