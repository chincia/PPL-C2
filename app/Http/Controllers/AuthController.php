<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function post_login(Request $request)
    {
        if (Auth::attempt($request->only('username', 'password'))) {
            if (Auth::user()->role_id == '2') {
                return redirect('/karyawan/dashboard');
            } elseif (Auth::user()->role_id == '1') {
                return redirect('/admin/dashboard');
            } else {
                return redirect('/login')->withError("Username atau Password salah");
            }
        }
        return redirect('/login')->withError("Username/Password salah");
    }

    public function register()
    {
        return view('auth.register');
    }

    public function post_register(Request $request)
    {

        User::create([
            'role_id' => 1,
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => bcrypt($request->password)
        ]);

        $newest_user = User::select('id')->orderBy('id', 'desc')->first();
        $newest_user = $newest_user['id'];

        Admin::create([
            'user_id' => $newest_user,
            'nama' => $request->nama,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'tanggal_lahir' => $request->tanggal_lahir,
            'username' => $request->username,
            'password' => bcrypt($request->password)
        ]);

        return redirect('/login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
