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

    if (!Auth::attempt($credentials)) {
        return response()->json(['message' => 'Email atau Password Salah!'], 401);
    }

    $user = Auth::user();

    return response()->json([
        'message' => 'Selamat Bekerja ',
        'user' => $user 
    ]);
}
public function logout()
{
    Auth::logout();

    return redirect()->route('login');
}
}
