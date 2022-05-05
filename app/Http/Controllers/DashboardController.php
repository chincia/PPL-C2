<?php

namespace App\Http\Controllers;

use App\Models\Keuangan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function admin_dashboard()
    {
        $debit = Keuangan::select('keterangan','total_transaksi')->where('keterangan','=','debit')->sum('total_transaksi');
        $kredit = Keuangan::select('keterangan','total_transaksi')->where('keterangan','=','kredit')->sum('total_transaksi');
        $pendapatan = intval($debit) - intval($kredit);
        $rekap = Keuangan::select('id','keterangan','transaksi','total_transaksi')->orderBy('id','desc')->limit(3)->get();
        return view('admin.dashboard', compact('debit','kredit','pendapatan','rekap'));
    }

    public function karyawan_dashboard()
    {
        return view('karyawan.dashboard');
    }
}
