<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\MidtransController;
use App\Models\DetailPesanan;
use App\Models\Paket;
use App\Models\Pesanan;
use App\Models\Transaksi;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;

class PesanController extends Controller
{
    public function index($id)
    {
        $paket = Paket::find($id);
        return view('pesan', compact('paket'));
    }

    public function simpan(Request $request)
    {
        $id_pesanan = Pesanan::orderBy('id', 'DESC')->first();
        if($id_pesanan){
            $id = $id_pesanan->order_id;
            if($id == null){
                $order_id = 'ORD-00001';
            } else {
                $urutan = (int) substr($id, 4, 5);
                $urutan++;
                $order_id = 'ORD-'.sprintf("%05s", $urutan);
            }
        } else {
            $order_id = 'ORD-00001';
        }

        if($request->has('tgl')){
            $pesanan = DetailPesanan::whereDate('tgl', $request->tgl)
                        ->first();

            if($pesanan){
                return redirect()->back()->with('error', 'Tanggal '.Carbon::parse($request->tgl)->format('d M Y').' Sudah dibooking');
            }

            $pesanan = new Pesanan();
            $pesanan->order_id = $order_id;
            $pesanan->user_id = auth()->user()->id;
            $pesanan->nama = $request->nama;
            $pesanan->telp = $request->telp;
            $pesanan->alamat = $request->alamat;
            $pesanan->save();

            $detail = new DetailPesanan();
            $detail->pesanan_id = $pesanan->id;
            $detail->paket_id = $request->paket;
            $detail->tgl = $request->tgl;
            $detail->save();

            return redirect()->back();
        } else {
            $period = CarbonPeriod::create($request->tgl_mulai, $request->tgl_selesai);
            foreach($period as $date){
                $pesanan = DetailPesanan::whereDate('tgl', $date->format('Y-m-d'))
                            ->first();
                if($pesanan){
                    return redirect()->back()->with('error', 'Tanggal '.$date->format('d M Y').' Sudah dibooking');
                }
                $dates[] = $date->format('Y-m-d');
            }

            $pesanan = new Pesanan();
            $pesanan->order_id = $order_id;
            $pesanan->user_id = auth()->user()->id;
            $pesanan->nama = $request->nama;
            $pesanan->telp = $request->telp;
            $pesanan->alamat = $request->alamat;
            $pesanan->save();

            foreach($dates as $date){
                $detail = new DetailPesanan();
                $detail->pesanan_id = $pesanan->id;
                $detail->paket_id = $request->paket;
                $detail->tgl = $date;
                $detail->save();
            }

            return redirect()->route('beranda');
        }
    }

    public function riwayat()
    {
        $pesanan = Pesanan::where('user_id', auth()->user()->id)
                    ->where('status', '!=', 'cancel')
                    ->get();
        return view('pesanan', compact('pesanan'));
    }

    public function bayar($id)
    {
        $pesanan = Pesanan::find($id);
        $detail = DetailPesanan::where('pesanan_id', $id)->get()->count();
        $harga = $pesanan->detail[0]->paket->harga;
        $total = $detail * $harga;
        $user = array(
            'nama' => $pesanan->nama,
            'email' => auth()->user()->email,
            'telp' => $pesanan->telp,
        );
        $order = array(
            'id' => $pesanan->order_id,
            'harga' => $total
        );
        $token = MidtransController::config(json_encode($user), json_encode($order));
        return view('bayar', compact('token', 'id'));
    }

    public function transaksi(Request $request)
    {
        $json = json_decode($request->json);
        $transaksi = new Transaksi();
        $transaksi->pesanan_id = $request->id;
        $transaksi->biaya = $json->gross_amount;
        $transaksi->tipe_pembayaran = $json->payment_type;
        $transaksi->transaksi_id = $json->transaction_id;
        $transaksi->status_transaksi = $json->transaction_status;
        $transaksi->bank = $json->va_numbers[0]->bank ?? null;
        $transaksi->nomor_va = $json->va_numbers[0]->va_number ?? null;
        $transaksi->status_pembayaran = $json->transaction_status;
        $transaksi->pdf_url = $json->pdf_url;
        $transaksi->save();

        return redirect()->route('pesanan');
    }
}
