<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Exists;

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
                if(Auth::user()->status == 'nonaktif'){
                    return redirect('/login');
                }else{
                    return redirect('/karyawan/dashboard')->with("success", "Login berhasil");
                }
            } elseif (Auth::user()->role_id == '1') {
                return redirect('/admin/dashboard')->with("success", "Login Berhasil");
            } 
            else {
                return redirect('/login')->withError("Username atau Password salah");
            }
        } elseif ($request->username == null || $request->password == null){
            return redirect('/login')->withError("Data tidak boleh kosong");
        } 
        return redirect('/login')->withError("Username dan Password salah");
    }

    public function register()
    {
        return view('auth.register');
    }

    public function post_register(Request $request)
    {
        

        $password = $request->password;
        $konfirmasi_password = $request->konfirmasi_password;
        if ($request->nama == null || $request->email == null || $request->username == null || $request->password == null || $request->konfirmasi_password == null || $request->no_hp == null){
            return redirect('/register')->withError("Data tidak boleh kosong");
        }
        elseif($password == $konfirmasi_password){
            $request->validate([
                "email" => ["required", "unique:Admin,email"],
                "username" => ["required", "unique:Admin,username"]
            ]);
            User::create([
                'role_id' => 1,
                'nama' => $request->nama,
                'username' => $request->username,
                'password' => bcrypt($password),
                'konfirmasi_password' => bcrypt($konfirmasi_password)
            ]);
            
            $newest_user = User::select('id')->orderBy('id', 'desc')->first();
            $newest_user = $newest_user['id'];
            
            Admin::create([
                'user_id' => $newest_user,
                'nama' =>  $request->nama,
                'email' => $request->email,
                'no_hp' => $request->no_hp,
                'username' => $request->username,
                'password' => bcrypt($request->password),
                'konfirmasi_password' => bcrypt($request->konfirmasi_password)
            ]);
            return redirect('/login')->with("success", "Akun berhasil ditambahkan");
        }
        else {
            return redirect('/register')->withError("Kombinasi Password tidak sama!");
        }

    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
