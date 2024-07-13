<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('sla.login');
    }

    public function authenticate(Request $request)
{
    $credentials = $request->only('email', 'password');

    $user = \App\Models\User::where('email', $credentials['email'])->first();
    if (!$user) {
        return response()->json(['message' => 'Email Salah!'], 401);
    }

    if (!Auth::attempt($credentials)) {
        return response()->json(['message' => 'Password Salah!'], 401);
    }

    return response()->json(['message' => 'Anda berhasil login!']);
    
}
public function logout()
{
    Auth::logout();

    return redirect()->route('login');
}
}
