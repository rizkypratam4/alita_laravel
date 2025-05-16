<?php

namespace Database\Seeders;

use App\Models\Area;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Area::insert([
            [
                'code' => '01101',
                'name' => 'JABODETABEK',
                'creator_id' => 2,
                'created_at' => now(),
            ],
            [
                'code' => '01102',
                'name' => 'JAWA BARAT',
                'creator_id' => 2,
                'created_at' => now(),
            ],
            [
                'code' => '01103',
                'name' => 'SUMATERA UTARA',
                'creator_id' => 2,
                'created_at' => now(),
                
            ],
            [
                'code' => '01104',
                'name' => 'RIAU',
                'creator_id' => 2,
                'created_at' => now(),
            ],
            [
                'code' => '01105',
                'name' => 'JAWA TENGAH',
                'creator_id' => 2,
                'created_at' => now(),
                
            ],
            [
                'code' => '01106',
                'name' => 'LAMPUNG',
                'creator_id' => 2,
                'created_at' => now(),
            ],
            [
                'code' => '01107',
                'name' => 'SUMATERA BARAT',
                'creator_id' => 2,
                'created_at' => now(),
                
            ],
        ]);
    }
}
