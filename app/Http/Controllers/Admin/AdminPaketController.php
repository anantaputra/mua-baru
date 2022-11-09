<?php

namespace App\Http\Controllers\Admin;

use App\Models\Paket;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminPaketController extends Controller
{
    public function index()
    {
        $paket = Paket::all();
        return view('admin.paket.index', compact('paket'));
    }

    public function tambah()
    {
        return view('admin.paket.tambah');
    }

    public function ubah($id)
    {
        $paket = Paket::find($id);
        return view('admin.paket.edit', compact('paket'));
    }

    public function simpan(Request $request)
    {
        $paket = new Paket();
        $paket->nama_paket = $request->nama;
        $paket->harga = $request->harga;
        $paket->deskripsi = $request->deskripsi;
        if($request->hasFile('gambar')){
            $filename = rand() . $request->file('gambar')->getClientOriginalName();
            $request->file('gambar')->move(public_path() . '/paket', $filename);
            $paket->gambar = $filename;
        }
        $paket->save();
        return redirect()->route('admin.paket');
    }

    public function edit(Request $request)
    {
        $paket = Paket::find($request->id);
        $paket->nama_paket = $request->nama;
        $paket->harga = $request->harga;
        $paket->deskripsi = $request->deskripsi;
        if($request->hasFile('gambar')){
            $filename = $request->file('gambar')->getClientOriginalName();
            $request->file('gambar')->move(public_path() . '/paket', $filename);
            $paket->gambar = $filename;
            $paket->save();
            return redirect()->route('admin.paket');
        }
    }

    public function hapus($id)
    {
        $paket = Paket::find($id);
        $paket->delete();
        return redirect()->route('admin.paket');
    }
}
