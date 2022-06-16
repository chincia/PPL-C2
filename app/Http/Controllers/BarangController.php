<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        $data = Barang::all();
        return view('all.barang.index', compact('data'));
    }
    
    public function katalog()
    {
        $data = Barang::all();
        return view('all.barang.katalog', compact('data'));
    }

    public function create()
    {
        return view('all.barang.create');
    }

    public function insert(Request $request)
    {
        
        if ($request->nama_barang == null || $request->harga_barang == null || $request->stok_barang == null || $request->deskripsi_barang == null){
            return redirect('/barang/create')->with("error","Data tidak boleh kosong");
        }
        $request->validate([
            "nama_barang" => ["required", "unique:Barang,nama_barang"],
        ]);
        $data = Barang::create($request->all());
        
        if ($request->hasFile('foto_barang')) {
            $request->file('foto_barang')->move('foto-barang/', $request->file('foto_barang')->getClientOriginalName());
            $data->foto_barang = $request->file('foto_barang')->getClientOriginalName();
            $data->save();
        }
        return redirect('barang')->with("success","Data berhasil ditambah");
    }

    public function detail($id)
    {
        $data = Barang::where('id',$id)->first();
        return view('all.barang.detail', compact('data'));
    }

    public function edit($id)
    {
        $data = Barang::where('id',$id)->first();
        return view('all.barang.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $ambil = Barang::findorfail($id);
        $gambar = $ambil->foto_barang;

        $foto_barang = $request->foto_barang;
        if (isset($foto_barang)) {
            $data = [
                'nama_barang' => $request->nama_barang,
                'harga_barang' => $request->harga_barang,
                'stok_barang' => $request->stok_barang,
                'deskripsi_barang' => $request->deskripsi_barang,
                'foto_barang' => $gambar,
            ];
            $request->foto_barang->move(public_path() . '/foto-barang', $gambar);
        } else {
            $data = [
                'nama_barang' => $request->nama_barang,
                'harga_barang' => $request->harga_barang,
                'stok_barang' => $request->stok_barang,
                'deskripsi_barang' => $request->deskripsi_barang,
            ];
        }
        $ambil->update($data);

        return redirect('/barang')->with("success","Data berhasil diubah");
    }
}
