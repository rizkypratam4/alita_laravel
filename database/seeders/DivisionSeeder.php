<?php

namespace Database\Seeders;

use App\Models\Division;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Division::insert([
            [
                'departement_id' => 1,
                'name' => 'PROGRAMMING',
                'creator_id' => 2,
                'created_at' => now(),
                
            ],
            [
                'departement_id' => 1,
                'name' => 'INFRASTRUCTURE',
                'creator_id' => 2,
                'created_at' => now(),
            ],
            [
                'departement_id' => 3,
                'name' => 'FINANCE',
                'creator_id' => 2,
                'created_at' => now(),
                
            ],
            [
                'departement_id' => 3,
                'name' => 'ACCOUNTING',
                'creator_id' => 2,
                'created_at' => now(),
            ],
            [
                'departement_id' => 3,
                'name' => 'TAX',
                'creator_id' => 2,
                'created_at' => now(),
                
            ],
            [
                'departement_id' => 2,
                'name' => 'ACS',
                'creator_id' => 2,
                'created_at' => now(),
            ],
            [
                'departement_id' => 2,
                'name' => 'PPIC',
                'creator_id' => 2,
                'created_at' => now(),
                
            ],
            [
                'departement_id' => 2,
                'name' => 'FINISH GOOD WAREHOUSE',
                'creator_id' => 2,
                'created_at' => now(),
            ],
            [
                'departement_id' => 2,
                'name' => 'RAW MATERIAL WAREHOUSE',
                'creator_id' => 2,
                'created_at' => now(),
                
            ],
            [
                'departement_id' => 2,
                'name' => 'QUALITY CONTROL',
                'creator_id' => 2,
                'created_at' => now(),
            ],
            [
                'departement_id' => 2,
                'name' => 'DELIVERY',
                'creator_id' => 2,
                'created_at' => now(),
                
            ],
            [
                'departement_id' => 2,
                'name' => 'ENGINEERING',
                'creator_id' => 2,
                'created_at' => now(),
            ],
            [
                'departement_id' => 2,
                'name' => 'PRODUCTION',
                'creator_id' => 2,
                'created_at' => now(),
                
            ],
            [
                'departement_id' => 2,
                'name' => 'MAINTENANCE',
                'creator_id' => 2,
                'created_at' => now(),
                
            ],
            [
                'departement_id' => 5,
                'name' => 'GENERAL AFFAIR',
                'creator_id' => 2,
                'created_at' => now(),
            ],
            [
                'departement_id' => 2,
                'name' => 'APPLICATION SERVICES',
                'creator_id' => 2,
                'created_at' => now(),
                
            ],
            [
                'departement_id' => 3,
                'name' => 'COLLECTOR',
                'creator_id' => 2,
                'created_at' => now(),
            ],
            [
                'departement_id' => 3,
                'name' => 'CASHIER',
                'creator_id' => 2,
                'created_at' => now(),
                
            ],
        ]);
    }
}
