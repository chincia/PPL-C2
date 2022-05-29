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
        Keuangan::create([
            'keterangan' => $request->keterangan,
            'transaksi' => $request->transaksi,
            'tanggal' => $request->tanggal,
            'jumlah_transaksi' => $request->jumlah_transaksi,
            'harga_satuan' => $request->harga_satuan,
            'total_transaksi' => intval($request->jumlah_transaksi) * intval($request->harga_satuan)
        ]);

        return redirect('/keuangan');
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
        return redirect('/keuangan');
    }
}
