<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $data = Admin::join('users', 'admin.user_id', '=', 'users.id')->select('admin.id', 'admin.nama', 'admin.user_id' ,'admin.email', 'admin.no_hp', 'admin.tanggal_lahir','admin.password')->get();

        return view('admin.admin.index', compact('data'));
    }

    public function detail($id)
    {
        $data = Admin::join('users', 'admin.user_id', '=', 'users.id')->join('role', 'users.role_id', '=', 'role.id')->select('admin.nama', 'admin.email', 'admin.no_hp', 'admin.tanggal_lahir', 'admin.username', 'admin.password', 'admin.user_id', 'users.role_id', 'role.role','admin.id')->where('admin.id', $id)->first();
        return view('admin.admin.detail', compact('data'));
    }

    public function edit($id)
    {
        $data = Admin::join('users', 'admin.user_id', '=', 'users.id')->join('role', 'users.role_id', '=', 'role.id')->select('admin.id','admin.nama', 'admin.email', 'admin.no_hp', 'admin.tanggal_lahir', 'admin.username', 'admin.password', 'admin.user_id', 'users.role_id', 'role.role')->where('admin.id', $id)->first();
        return view('admin.admin.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $password = $request->password;

        if (isset($password)) {
            $data_user = User::where('id', $id)->update([
                'nama' => $request->nama,
                'username' => $request->username,
                'password' => bcrypt($password)
            ]);
            $data_admin = Admin::where('id', $id)->update([
                'nama' => $request->nama,
                'username' => $request->username,
                'email' => $request->email,
                'no_hp' => $request->no_hp,
                'tanggal_lahir' => $request->tanggal_lahir,
                'password' => bcrypt($password),
            ]);
        }else{
            $data_user = User::where('id', $id)->update([
                'nama' => $request->nama,
                'username' => $request->username
            ]);
            $data_admin = Admin::where('id', $id)->update([
                'nama' => $request->nama,
                'username' => $request->username,
                'email' => $request->email,
                'no_hp' => $request->no_hp,
                'tanggal_lahir' => $request->tanggal_lahir,
            ]);
        }
        return redirect('/admin/admin');
    }

    public function create()
    {
        return view('admin.admin.create');
    }

    public function insert(Request $request)
    {
        User::create([
            'role_id' => 1,
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => $request->password,
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

        return redirect('admin/admin');
    }
}
