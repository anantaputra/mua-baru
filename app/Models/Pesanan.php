<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    public function detail()
    {
        return $this->hasMany(DetailPesanan::class, 'pesanan_id');
    }

    public function transaksi()
    {
        return $this->hasOne(Transaksi::class, 'pesanan_id');
    }
}
