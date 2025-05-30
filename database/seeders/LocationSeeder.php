<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         Location::insert([
            [
                'name' => 'KAWAT/PER',
                'creator_id' => 2,
                'created_at' => now(),
            ],
            [
                'name' => 'AREA FINISH GOOD',
                'creator_id' => 2,
                'created_at' => now(),
            ],
            [
                'name' => 'RUANGAN ICU',
                'creator_id' => 2,
                'created_at' => now(),
                
            ],
            [
                'name' => 'AREA BORDER',
                'creator_id' => 2,
                'created_at' => now(),
            ],
            [
                'name' => 'AREA QUILTING',
                'creator_id' => 2,
                'created_at' => now(),
                
            ],
            [
                'name' => 'AREA JAHIT',
                'creator_id' => 2,
                'created_at' => now(),
            ],
            [
                'name' => 'AREA JAHIT ATAS',
                'creator_id' => 2,
                'created_at' => now(),
                
            ],
        ]);
    }
}
