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
        $password = $request->password;
        $konfirmasi_password = $request->konfirmasi_password;

        if($password == $konfirmasi_password){

            User::create([
                'role_id' => 2,
                'nama' => $request->nama,
                'username' => $request->username,
                'password' => bcrypt($password),
                'konfirmasi_password' => bcrypt($konfirmasi_password),
                'status' => $request->status
            ]);
            
            $newestuser = User::select('id')->orderBy('id', 'desc')->first();
            $newestuser = $newestuser['id'];
            
            Karyawan::create([
                'user_id' => $newestuser,
                'nama_karyawan' => $request->nama,
                'username' => $request->username,
                'password' => bcrypt($request->password),
                'konfirmasi_password' => bcrypt($konfirmasi_password),
                'no_hp' => $request->no_hp,
                'alamat' => $request->alamat,
                'tanggal_lahir' => $request->tanggal_lahir,
                'status' => $request->status
            ]);
            
            return redirect('karyawan');
        }else{
            return redirect('/karyawan/create')->withError("Masukkan data yang valid!");
        }
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
        $user = User::rightjoin('karyawan','users.id','=','karyawan.user_id')->select('users.status','karyawan.id','karyawan.user_id')->where('karyawan.id', $id)->update([
            'users.status' => $request->status
        ]);
        $karyawan = Karyawan::where('id', $id)->update([
            'status' => $request->status
        ]);
        return redirect('karyawan');
    }
}
