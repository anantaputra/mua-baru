<?php

namespace App\Http\Controllers;

use App\Models\DetailPesanan;
use App\Models\Paket;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $paket = Paket::all();
        return view('home', compact('paket'));
    }

    public function detail($id)
    {
        $paket = Paket::find($id);
        return view('detail', compact('paket'));
    }

    public function jadwal(Request $request)
    {
        $data = DetailPesanan::with('pesanan')
                ->whereHas('pesanan', function($q){
                    $q->where('status', 'settlement');
                })
                ->whereBetween('tgl', [$request->start, $request->end])
                ->get('tgl');
        foreach($data as $item){
            $response[] = array(
                'title' => 'Penuh',
                'start' => $item->tgl,
                
            );
        }
        return response()->json($response);
    }
}
