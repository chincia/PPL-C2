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
        Artikel::create([
            'barang_id' => $request->barang_id,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect('/artikel');
    }

    public function detail($id)
    {
        $data = Artikel::join('barang','artikel.barang_id','=','barang.id')->select('artikel.barang_id','artikel.deskripsi','artikel.id','barang.nama_barang','barang.foto_barang')->where('artikel.id',$id)->first();
        return view('all.artikel.detail', compact('data'));
    }

    public function edit($id)
    {
        $barang = Barang::all();
        $data = Artikel::where('id',$id)->first();
        return view('all.artikel.edit', compact('barang','data'));
    }

    public function update(Request $request, $id)
    {
        $data = Artikel::where('id',$id)->update([
            'barang_id' => $request->barang_id,
            'deskripsi' => $request->deskripsi
        ]);

        return redirect('/artikel');
    }
}
