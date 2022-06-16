<?php

namespace App\Http\Controllers;

use App\Models\Keuangan;
use Illuminate\Http\Request;

class KeuanganController extends Controller
{
    public function index()
    {
        $data = Keuangan::all();
        return view('admin.keuangan.index', compact('data'));
    }

    public function create()
    {
        return view('admin.keuangan.create');
    }

    public function insert(Request $request)
    {
        if ($request->transaksi == null || $request->tanggal == null || $request->jumlah_transaksi == null || $request->harga_satuan == null){
            return redirect('/keuangan/create')->with("error","Data tidak boleh kosong");
        }
        Keuangan::create([
            'keterangan' => $request->keterangan,
            'transaksi' => $request->transaksi,
            'tanggal' => $request->tanggal,
            'jumlah_transaksi' => $request->jumlah_transaksi,
            'harga_satuan' => $request->harga_satuan,
            'total_transaksi' => intval($request->jumlah_transaksi) * intval($request->harga_satuan)
        ]);

        return redirect('/keuangan')->with("success","Data berhasil ditambah");
    }

    public function edit($id)
    {
        $data = Keuangan::where('id', $id)->first();
        return view('admin.keuangan.edit',compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Keuangan::where('id', $id)->update([
            'keterangan' => $request->keterangan,
            'transaksi' => $request->transaksi,
            'jumlah_transaksi' => $request->jumlah_transaksi,
            'harga_satuan' => $request->harga_satuan,
            'total_transaksi' => intval($request->jumlah_transaksi) * intval($request->harga_satuan)
        ]);
        return redirect('/keuangan')->with("success","Data berhasil diubah");
    }
}
