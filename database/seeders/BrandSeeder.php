<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         Brand::insert([
            [
                'name' => 'LIAN ROU',
                'creator_id' => 2,
                'created_at' => now(),
            ],
            [
                'name' => 'JUKI',
                'creator_id' => 2,
                'created_at' => now(),
            ],
            [
                'name' => 'ANCHAIN',
                'creator_id' => 2,
                'created_at' => now(),
                
            ],
            [
                'name' => 'KAESAR',
                'creator_id' => 2,
                'created_at' => now(),
            ],
            [
                'name' => 'ZHONGDA',
                'creator_id' => 2,
                'created_at' => now(),
                
            ],
            [
                'name' => 'ZHIJIANG HUAJIAN',
                'creator_id' => 2,
                'created_at' => now(),
            ],
            [
                'name' => 'SHIMARU',
                'creator_id' => 2,
                'created_at' => now(),
                
            ],
            [
                'name' => 'NAIGU',
                'creator_id' => 2,
                'created_at' => now(),
                
            ],
            [
                'name' => 'TYPICAL',
                'creator_id' => 2,
                'created_at' => now(),
            ],
            [
                'name' => 'HENGCHANG',
                'creator_id' => 2,
                'created_at' => now(),
                
            ],
            [
                'name' => 'STENBERGH',
                'creator_id' => 2,
                'created_at' => now(),
                
            ],
            [
                'name' => 'FOSHAN YUANTIAN',
                'creator_id' => 2,
                'created_at' => now(),
                
            ],
        ]);
    }
}
