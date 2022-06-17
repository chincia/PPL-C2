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
        
        $data = Penjualan::join('barang','penjualan.barang_id','=','barang.id')->join('karyawan','penjualan.karyawan_id','=','karyawan.id')->join('pelanggan','penjualan.pelanggan_id','=','pelanggan.id')->select('penjualan.id','barang.nama_barang','karyawan.nama_karyawan','pelanggan.nama_pelanggan','penjualan.total_penjualan','penjualan.tanggal')->orderBy('tanggal')->get();
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
        if ($request->tanggal == null || $request->jumlah_barang == null){
            return redirect('/penjualan/create')->with("error","Data tidak boleh kosong");
        }
        $harga = Barang::select('id','harga_barang')->where('id',$request->barang_id)->first();
        $harga = $harga['harga_barang'];
        Penjualan::create([
            'barang_id' => $request->barang_id,
            'karyawan_id' => $request->karyawan_id,
            'pelanggan_id' => $request->pelanggan_id,
            'tanggal' => $request->tanggal,
            'jumlah_barang' => $request->jumlah_barang,
            'harga_barang' => $harga,
            'total_penjualan' => intval($request->jumlah_barang)*intval($harga)
        ]);

        Keuangan::create([
            'keterangan' => 'debit',
            'transaksi' => 'Penjualan',
            'tanggal' => $request->tanggal,
            'jumlah_transaksi' => $request->jumlah_barang,
            'harga_satuan' => $harga,
            'total_transaksi' => intval($request->jumlah_barang)*intval($harga)
        ]);

        return redirect('/penjualan')->with("success","Data berhasil ditambah");
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
        $harga = Barang::select('id','harga_barang')->where('id',$request->barang_id)->first();
        $harga = $harga['harga_barang'];
        $data = Penjualan::where('id', $id)->update([
            'barang_id' => $request->barang_id,
            'karyawan_id' => $request->karyawan_id,
            'pelanggan_id' => $request->pelanggan_id,
            'tanggal' => $request->tanggal,
            'jumlah_barang' => $request->jumlah_barang,
            'harga_barang' => $harga,
            'total_penjualan' => intval($request->jumlah_barang)*intval($harga)
        ]);

        $keuangan = Keuangan::where('id', $id)->update([
            'jumlah_transaksi' => $request->jumlah_barang,
            'harga_satuan' => $harga,
            'total_transaksi' => intval($request->jumlah_barang)*intval($harga)
        ]);

        return redirect('/penjualan')->with("success","Data berhasil diubah");
    }
}
