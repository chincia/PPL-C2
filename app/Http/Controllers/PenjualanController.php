<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Karyawan;
use App\Models\Keuangan;
use App\Models\Pelanggan;
use App\Models\Penjualan;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    public function index()
    {
        
        $data = Penjualan::join('barang','penjualan.barang_id','=','barang.id')->join('karyawan','penjualan.karyawan_id','=','karyawan.id')->join('pelanggan','penjualan.pelanggan_id','=','pelanggan.id')->select('penjualan.id','barang.nama_barang','karyawan.nama','pelanggan.nama','penjualan.total_penjualan')->get();
        return view('all.penjualan.index', compact('data'));
    }

    public function create()
    {
        $barang = Barang::all();
        $karyawan = Karyawan::all();
        $pelanggan = Pelanggan::all();
        return view('all.penjualan.create',compact('barang','karyawan','pelanggan'));
    }

    public function insert(Request $request)
    {
        Penjualan::create([
            'barang_id' => $request->barang_id,
            'karyawan_id' => $request->karyawan_id,
            'pelanggan_id' => $request->pelanggan_id,
            'jumlah_barang' => $request->jumlah_barang,
            'harga_barang' => $request->harga_barang,
            'total_penjualan' => intval($request->jumlah_barang)*intval($request->harga_barang)
        ]);

        Keuangan::create([
            'keterangan' => 'masuk',
            'transaksi' => 'Penjualan',
            'jumlah_transaksi' => $request->jumlah_barang,
            'harga_satuan' => $request->harga_barang,
            'total_transaksi' => intval($request->jumlah_barang)*intval($request->harga_barang)
        ]);

        return redirect('/penjualan');
    }

    public function edit($id)
    {
        $barang = Barang::all();
        $karyawan = Karyawan::all();
        $pelanggan = Pelanggan::all();
        $data = Penjualan::where('id',$id)->first();
        return view('all.penjualan.edit', compact('data','barang','karyawan','pelanggan'));
    }

    public function update(Request $request, $id)
    {
        $data = Penjualan::where('id', $id)->update([
            'barang_id' => $request->barang_id,
            'karyawan_id' => $request->karyawan_id,
            'pelanggan_id' => $request->pelanggan_id,
            'jumlah_barang' => $request->jumlah_barang,
            'harga_barang' => $request->harga_barang,
            'total_penjualan' => intval($request->jumlah_barang)*intval($request->harga_barang)
        ]);

        $keuangan = Keuangan::where('id', $id)->update([
            'jumlah_transaksi' => $request->jumlah_barang,
            'harga_satuan' => $request->harga_barang,
            'total_transaksi' => intval($request->jumlah_barang)*intval($request->harga_barang)
        ]);

        return redirect('/penjualan');
    }
}
