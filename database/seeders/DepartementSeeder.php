<?php

namespace Database\Seeders;

use App\Models\Departement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Departement::insert([
            [
                'name' => 'INFORMATION TECHNOLOGY',
                'creator_id' => 2,
                'created_at' => now(),
            ],
            [
                'name' => 'OPERATION',
                'creator_id' => 2,
                'created_at' => now(),
            ],
            [
                'name' => 'AFA',
                'creator_id' => 2,
                'created_at' => now(),
                
            ],
            [
                'name' => 'SALES',
                'creator_id' => 2,
                'created_at' => now(),
            ],
            [
                'name' => 'HRD & GA',
                'creator_id' => 2,
                'created_at' => now(),
                
            ],
            [
                'name' => 'PURCHASING',
                'creator_id' => 2,
                'created_at' => now(),
            ],
            [
                'name' => 'INTERNAL AUDITOR',
                'creator_id' => 2,
                'created_at' => now(),
                
            ],
            [
                'name' => 'MICIN',
                'creator_id' => 2,
                'created_at' => now(),
                
            ],
            [
                'name' => 'DATA ANALYST',
                'creator_id' => 2,
                'created_at' => now(),
            ],
            [
                'name' => 'RESEARCH & DEVELOPMENT',
                'creator_id' => 2,
                'created_at' => now(),
                
            ],
            [
                'name' => 'CORPORATE FINANCE',
                'creator_id' => 2,
                'created_at' => now(),
                
            ],
            [
                'name' => 'HR DEVELOPMENT',
                'creator_id' => 2,
                'created_at' => now(),
            ],
            [
                'name' => 'SECRETARY',
                'creator_id' => 2,
                'created_at' => now(),
                
            ],
            [
                'name' => 'PROMOTION',
                'creator_id' => 2,
                'created_at' => now(),
            ],
            [
                'name' => 'RETAIL DEVELOPMENT',
                'creator_id' => 2,
                'created_at' => now(),
                
            ],
        ]);
    }
}
