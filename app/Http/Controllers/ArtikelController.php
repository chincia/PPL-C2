<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Barang;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    public function index()
    {
        $data = Artikel::join('barang','artikel.barang_id','=','barang.id')->select('artikel.barang_id','artikel.deskripsi','artikel.id','barang.nama_barang')->get();
        return view('all.artikel.index', compact('data'));
    }

    public function create()
    {
        $barang = Barang::all();
        return view('all.artikel.create', compact('barang'));
    }

    public function insert(Request $request)
    {
        
        if ($request->barang_id == null || $request->deskripsi == null){
            return redirect('/artikel/create')->with("error","Data tidak boleh kosong");
        }else{
            $request->validate([
                "deskripsi" => ["required", "unique:Artikel,deskripsi"],
            ]);
            Artikel::create([
                'barang_id' => $request->barang_id,
                'deskripsi' => $request->deskripsi,
        ]);
        

        return redirect('/artikel')->with("success","Data berhasil ditambah");}
    }

    public function detail($id)
    {
        $data = Artikel::join('barang','artikel.barang_id','=','barang.id')->select('artikel.barang_id','artikel.deskripsi','artikel.id','barang.nama_barang','barang.foto_barang')->where('artikel.id',$id)->first();
        return view('all.artikel.detail', compact('data'));
    }

    public function edit($id)
    {
        $data_barang = Barang::all();
        $data = Artikel::where('id',$id)->first();
        return view('all.artikel.edit', compact('data_barang','data'));
    }

    public function update(Request $request, $id)
    {
        $data = Artikel::where('id',$id)->update([
            'barang_id' => $request->barang_id,
            'deskripsi' => $request->deskripsi
        ]);
        return redirect('/artikel')->with("success","Data berhasil diubah");
    }
}
