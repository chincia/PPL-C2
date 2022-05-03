<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\User;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function index()
    {
        $data = Karyawan::all();
        return view('all.karyawan.index', compact('data'));
    }

    public function create()
    {
        return view('all.karyawan.create');
    }

    public function insert(Request $request)
    {
        User::create([
            'role_id' => 2,
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => bcrypt($request->password)
        ]);

        $newestuser = User::select('id')->orderBy('id', 'desc')->first();
        $newestuser = $newestuser['id'];

        Karyawan::create([
            'user_id' => $newestuser,
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'tanggal_lahir' => $request->tanggal_lahir,
            'status' => $request->status
        ]);

        return redirect('karyawan');
    }

    public function detail($id)
    {
        $data = Karyawan::where('id', $id)->first();
        return view('all.karyawan.detail', compact('data'));
    }

    public function edit($id)
    {
        $data = Karyawan::where('id', $id)->first();
        return view('all.karyawan.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Karyawan::where('id', $id)->update([
            'status' => $request->status
        ]);
        return redirect('karyawan');
    }
}
