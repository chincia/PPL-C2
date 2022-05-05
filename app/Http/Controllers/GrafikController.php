<?php

namespace App\Http\Controllers;

use App\Models\Keuangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class GrafikController extends Controller
{
    public function index()
    {
        $total_pendapatan = Keuangan::select(DB::raw("CAST(SUM(total_transaksi) as int) as total_pendapatan"))->where('keterangan','=','debit')->GroupBy(DB::raw("Month(created_at)"))->pluck('total_pendapatan');
        $total_pengeluaran = Keuangan::select(DB::raw("CAST(SUM(total_transaksi) as int) as total_pengeluaran"))->where('keterangan','=','kredit')->GroupBy(DB::raw("Month(created_at)"))->pluck('total_pengeluaran');

        
        $bulan = Keuangan::select(DB::raw("MONTHNAME(created_at) as bulan"))->GroupBy(DB::raw("MONTHNAME(created_at)"))->pluck('bulan');

        return view('admin.grafik.index', compact('total_pendapatan','total_pengeluaran','bulan'));
    }
}
