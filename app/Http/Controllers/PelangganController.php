<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\Pelanggan;
use App\Models\User;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function index()
    {
        $data = Pelanggan::all();
        return view('all.pelanggan.index', compact('data'));
    }

    public function create()
    {
        return view('all.pelanggan.create');
    }

    public function insert(Request $request)
    {

        if ($request->nama == null || $request->alamat == null || $request->no_hp == null){
            return redirect('/pelanggan/create')->with("error","Data tidak boleh kosong");
        }else{
        Pelanggan::create([
            'nama_pelanggan' => $request->nama,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
        ]);

        return redirect('pelanggan')->with("success","Data berhasil ditambah");
        }
    }

    public function detail($id)
    {
        $data = Pelanggan::where('id', $id)->first();
        return view('all.pelanggan.detail', compact('data'));
    }

    public function edit($id)
    {
        $data = Pelanggan::where('id', $id)->first();
        return view('all.pelanggan.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Pelanggan::where('id', $id)->update([
            'nama_pelanggan' => $request->nama,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp
        ]);
        return redirect('pelanggan')->with("success","Data berhasil diubah");
    }
}
