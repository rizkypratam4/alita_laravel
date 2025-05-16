<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::insert([
            [
                'name' => 'KENDARAAN',
                'creator_id' => 2,
                'created_at' => now(),
            ],
            [
                'name' => 'BANGUNAN',
                'creator_id' => 2,
                'created_at' => now(),
            ],
            [
                'name' => 'MESIN',
                'creator_id' => 2,
                'created_at' => now(),
                
            ],
            [
                'name' => 'PERALATAN KANTOR',
                'creator_id' => 2,
                'created_at' => now(),
            ],
            [
                'name' => 'PERALATAN PABRIK',
                'creator_id' => 2,
                'created_at' => now(),
                
            ],
            
        ]);
    }
}
