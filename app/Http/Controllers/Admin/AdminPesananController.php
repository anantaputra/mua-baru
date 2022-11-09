<?php

namespace App\Http\Controllers\Admin;

use App\Models\Pesanan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class AdminPesananController extends Controller
{
    public function index()
    {
        $pesanan = Pesanan::where('status', 'settlement')
                    ->with(['detail' => function($q){
                        $q->whereDate('tgl', '>=', Carbon::today())->get();
                    }])
                    ->get();
        return view('admin.pesanan', compact('pesanan'));
    }
}
