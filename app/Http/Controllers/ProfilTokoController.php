<?php

namespace App\Http\Controllers;

use App\Models\ProfilToko;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Profiler\Profile;

class ProfilTokoController extends Controller
{
    public function index()
    {
        $data = ProfilToko::first();
        return view('profil_toko.index',compact('data'));
    }

    public function create()
    {
        return view('profil_toko.create');
    }

    public function insert(Request $request)
    {
        ProfilToko::create([
            'nama_pemilik' => $request->nama_pemilik,
            'no_hp' => $request->no_hp,
            'tahun_berdiri' => $request->tahun_berdiri,
            'deskripsi' => $request->deskripsi
        ]);

        return redirect('/profil_toko');
    }

    public function edit()
    {
        $data = ProfilToko::first();
        return view('profil_toko.edit', compact('data'));
    }

    public function update(Request $request)
    {
        $data = ProfilToko::first()->update([
            'nama_pemilik' => $request->nama_pemilik,
            'no_hp' => $request->no_hp,
            'tahun_berdiri' => $request->tahun_berdiri,
            'deskripsi' => $request->deskripsi
        ]);

        return redirect('profil_toko');
    }
}
