<?php

namespace Database\Seeders;

use App\Models\Navigation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NavigationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Navigation::create([
            'name' => 'Parameter',
            'url' =>'Parameter',
            'icon'=>'ti-setting',
            'main_menu'=>null,
            
        ]);
        Navigation::create([
            'name' => 'Manage User',
            'url' =>'users',
            'icon'=>'',
            'main_menu'=>1,
        ]);
        Navigation::create([
            'name' => 'Manage cabang',
            'url' =>'cabang',
            'icon'=>'',
            'main_menu'=>1,
        ]);
        Navigation::create([
            'name' => 'Manage Roles',
            'url' =>'roles',
            'icon'=>'',
            'main_menu'=>1,
        ]);
        Navigation::create([
            'name' => 'Manage Menu',
            'url' =>'menu',
            'icon'=>'',
            'main_menu'=>1,
        ]);
        Navigation::create([
            'name' => 'Manage Permission',
            'url' =>'permission',
            'icon'=>'',
            'main_menu'=>1,
        ]);
        Navigation::create([
            'name' => 'Manage Mitra',
            'url' =>'mitra',
            'icon'=>'',
            'main_menu'=>1,
        ]);
        Navigation::create([
            'name' => 'Manage Jabatan',
            'url' =>'jabatan',
            'icon'=>'',
            'main_menu'=>1,
        ]);
        Navigation::create([
            'name' => 'Fasilitas Pinjaman',
            'url' =>'fasilitas',
            'icon'=>'ti-setting',
            'main_menu'=>null,
        ]);
        Navigation::create([
            'name' => 'Data Debitur',
            'url' =>'debitur',
            'icon'=>'',
            'main_menu'=>9,
        ]);
        Navigation::create([
            'name' => 'Data Fasilitas',
            'url' =>'fasilitas',
            'icon'=>'',
            'main_menu'=>9,
        ]);
        Navigation::create([
            'name' => 'Data Slik',
            'url' =>'slik',
            'icon'=>'ti-setting',
            'main_menu'=>null,
        ]);
        Navigation::create([
            'name' => 'Data Pengajuan Slik',
            'url' =>'slik',
            'icon'=>'',
            'main_menu'=>12,
        ]);
        Navigation::create([
            'name' => 'Data Slik',
            'url' =>'slik/dataslik',
            'icon'=>'',
            'main_menu'=>12,
        ]);
        Navigation::create([
            'name' => 'Data All Slik',
            'url' =>'slik/allslik',
            'icon'=>'',
            'main_menu'=>12,
        ]);
    }
}
