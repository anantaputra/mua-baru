<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\Pesanan;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MidtransController extends Controller
{
    public static function config($user, $order)
    {
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $user = json_decode($user);
        $order = json_decode($order);
        
        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => $order->harga,
            ),
            'customer_details' => array(
                'first_name' => $user->nama,
                'email' => $user->email,
                'phone' => $user->telp,
            ),
            'expiry' => array(
                'start_time' => Carbon::now()->format('Y-m-d H:i:s')." +0700",
                'unit' => 'hours',
                'duration' => 2
            )
        );
        
        $snapToken = \Midtrans\Snap::getSnapToken($params);

        return $snapToken;
    }

    public function handler(Request $request)
    {
        $json = json_decode($request->getContent());
        $signature = hash('sha512', $json->order_id . $json->status_code . $json->gross_amount . env('MIDTRANS_SERVER_KEY'));

        if($signature != $json->signature_key){
            return abort(404);
        }

        $transaksi = Transaksi::where('transaksi_id', $json->transaction_id)->first();
        $transaksi->status_transaksi = $json->transaction_status;
        $transaksi->status_pembayaran = $json->transaction_status;
        $pesanan = Pesanan::find($transaksi->pesanan_id);
        $pesanan->status = $json->transaction_status;
        $pesanan->save();
        return $transaksi->save();
    }
}
