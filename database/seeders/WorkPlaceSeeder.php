<?php

namespace Database\Seeders;

use App\Models\WorkPlace;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WorkPlaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         WorkPlace::insert([
            [
                'area_id' => 1,
                'name' => 'PT MASSINDO KARYA PRIMA BEKASI',
                'opening_hours' => '08:00:00',
                'closing_hours' => '20:58:00',
                'comforta' => 1,
                'therapedic' => 1,
                'spring_air' => 1,
                'super_fit' => 1,
                'isleep' => 1,
                'sleep_spa' => 1,
                'category' => 'PABRIK',
                'image' => 'images/work_places/wCbSQodWmpPiT6D8It5EYrEhATK8GA5pspqEmDHm.png',
                'address' => 'Jl. Cikiwul No.22, RT.002/RW.005, Cikiwul, Kec. Bantar Gebang, Kota Bks, Jawa Barat 17152',
                'creator_id' => 2,
                'created_at' => now(),
            ],
            [
                'area_id' => 3,
                'name' => 'PT MASSINDO KARYA PRIMA MEDAN',
                'opening_hours' => '08:00:00',
                'closing_hours' => '18:00:00',
                'comforta' => 1,
                'therapedic' => 1,
                'spring_air' => 1,
                'super_fit' => 1,
                'isleep' => 0,
                'sleep_spa' => 0,
                'category' => 'PABRIK',
                'image' => 'images/work_places/TyOEqQO5KeSrgHzScZLgI2lyDzy1NEttrdPF38Yd.jpg',
                'address' => 'JH47+VFC, Puji Mulyo, Kec. Sunggal, Kabupaten Deli Serdang, Sumatera Utara 20351',
                'creator_id' => 2,
                'created_at' => now(),
            ],
        ]);
    }
}
