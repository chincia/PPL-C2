<?php

namespace App\Http\Controllers;

use App\Models\Keuangan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function admin_dashboard()
    {
        $masuk = Keuangan::where('keterangan','=','masuk')->sum('total_transaksi');
        $keluar = Keuangan::where('keterangan','=','keluar')->sum('total_transaksi');
        $pendapatan = intval($masuk) - intval($keluar);
        return view('admin.dashboard', compact('masuk','keluar','pendapatan'));
    }

    public function karyawan_dashboard()
    {
        return view('karyawan.dashboard');
    }
}
