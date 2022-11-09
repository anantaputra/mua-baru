<?php

namespace Database\Seeders;

use App\Models\Paket;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PaketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Paket::create([
            'nama_paket' => 'PAKET AKAD 1',
            'harga' => 500000,
            'deskripsi' => 'Paket MUA 1 Biaya Murah dengan isi yang tidak biasa',
            'gambar' => '1.jpg'
        ]);
        
        Paket::create([
            'nama_paket' => 'PAKET AKAD 2',
            'harga' => 750000,
            'deskripsi' => 'Paket MUA 2 Biaya Lumayan Murah dengan isi yang tidak biasa',
            'gambar' => '1.jpg'
        ]);

        Paket::create([
            'nama_paket' => 'PAKET AKAD 3',
            'harga' => 1500000,
            'deskripsi' => 'Paket MUA 1 Biaya Murah dengan isi yang tidak biasa',
            'gambar' => '1.jpg'
        ]);
        
        Paket::create([
            'nama_paket' => 'PAKET AKAD 4',
            'harga' => 2000000,
            'deskripsi' => 'Paket MUA 2 Biaya Lumayan Murah dengan isi yang tidak biasa',
            'gambar' => '1.jpg'
        ]);
    }
}
