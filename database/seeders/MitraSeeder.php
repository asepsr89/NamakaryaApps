<?php

namespace Database\Seeders;

use App\Models\Mitra;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MitraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Mitra::create([
            'name' => 'Mega Central Finance (MCF)',
            'tlp' =>'021-53666627',
            'alamat'=>'Gedung Wisma 76 Lt. 12
            Jl. Letjen S. Parman kav 76, Slipi
            Jakarta 11410, Indonesia',
        ]);

        Mitra::create([
            'name' => 'PT BPRS Harta Insan Karimah',
            'tlp' =>'(021) 730 1456',
            'alamat'=>'Kantor Pusat Menara HIK
            Jl. HOS Cokroaminoto No. 17 RT 001 RW 004 Kel. Karang Timur, Kec. Karang Tengah, Kota Tangerang, Banten,
            15159',
        ]);

        Mitra::create([
            'name' => 'BPR Mitra Parahyangan ',
            'tlp' =>'(022) 522 6212 ',
            'alamat'=>'Jl. BKR Lingkar Selatan No. 154 A Kec. Regol, Kota Bandung
            Jawa Barat, Indonesia',
        ]);

    }
}
