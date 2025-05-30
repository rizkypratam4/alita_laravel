<?php

namespace Database\Seeders;

use App\Models\Asset;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MaintenanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Asset::insert([
            [
                'name' => 'PNEUMATIC BORDER BENDING MACHINE "YUANTIAN" QW-4',
                'tanggal_perolehan' => '2004-08-04',
                'supplier' => 'Foshan Yuantian',
                'serial_number' => 'PMBNGK01',
                'kode_asset' => '0140610016',
                'harga' => 'Rp 16,709,343',
                'kapasitas' => '6 bar',
                'brand_id' => 12,
                'work_place_id' => 1,
                'category_id' => 3,
                'type_id' => 2,
                'departement_id' => 2,
                'keterangan' => null,
                'image' => null,
                'status' => 0,
                'creator_id' => 2,
                'created_at' => now(),
            ],
            [
                'name' => 'SPRING COILING MACHINE/SX80IS',
                'tanggal_perolehan' => '2018-10-12',
                'supplier' => null,
                'serial_number' => 'SX80is',
                'kode_asset' => '0140610015',
                'harga' => 'Rp 16,709,343',
                'kapasitas' => '8 kw',
                'brand_id' => 6,
                'work_place_id' => 1,
                'category_id' => 3,
                'type_id' => 2,
                'departement_id' => 2,
                'keterangan' => null,
                'image' => 'images/maintenances/Dmx1Gf0a5qbbZ8g78qFHciKMRQMAnsY55aOvZt3m.jpg',
                'status' => 0,
                'creator_id' => 2,
                'created_at' => now(),
            ],
            [
                'name' => 'MESINNJAHIT SHIMARU SM9800-4',
                'tanggal_perolehan' => '2023-05-26',
                'supplier' => null,
                'serial_number' => 'JHT27',
                'kode_asset' => '0140613005',
                'harga' => 'Rp 4,500,000',
                'kapasitas' => '550 watt',
                'brand_id' => 7,
                'work_place_id' => 1,
                'category_id' => 3,
                'type_id' => 2,
                'departement_id' => 2,
                'keterangan' => null,
                'image' => 'images/maintenances/KyMhDCnLqn73pC9iyaa5uY0OB1EpHTbvC409kZ4u.jpg',
                'status' => 0,
                'creator_id' => 2,
                'created_at' => now(),
            ],

            [
                'name' => 'MESIN JAHIT JARUM TYPICAL GC0303CX_6',
                'tanggal_perolehan' => '2023-12-30',
                'supplier' => 'Typical',
                'serial_number' => 'JHT24',
                'kode_asset' => '0140606019',
                'harga' => 'Rp 5,400,000',
                'kapasitas' => '550 watt',
                'brand_id' => 9,
                'work_place_id' => 1,
                'category_id' => 3,
                'type_id' => 2,
                'departement_id' => 2,
                'keterangan' => null,
                'image' => 'images/maintenances/UciBBr2yLZBKHFY9V9EaY8Odn1OP2moIOkkM93ew.jpg',
                'status' => 0,
                'creator_id' => 2,
                'created_at' => now(),
            ],

            [
                'name' => 'MESIN JAHIT LOLOS LEHER PANJANG_2 (LONG ARM SEWING MACHINE (LEHER PANJANG) HENG CHANG)',
                'tanggal_perolehan' => '2023-12-30',
                'supplier' => 'Hengchang',
                'serial_number' => 'JHT21',
                'kode_asset' => '0140606016',
                'harga' => 'Rp 24,967,186,20',
                'kapasitas' => '550 watt',
                'brand_id' => 10,
                'work_place_id' => 1,
                'category_id' => 3,
                'type_id' => 2,
                'departement_id' => 2,
                'keterangan' => null,
                'image' => 'images/maintenances/DtKX8iUwQbVRyw89iXdYG5kRL571TBA3hc5B0oOn.jpg',
                'status' => 0,
                'creator_id' => 2,
                'created_at' => now(),
            ],

            [
                'name' => 'MESIN SEMI-AUTOMATIC MATTRESS COMPRESOR MANUAL NG-01M',
                'tanggal_perolehan' => '2022-07-20',
                'supplier' => 'NAIGU',
                'serial_number' => 'NG-01M',
                'kode_asset' => '0140605010',
                'harga' => 'Rp 107,617,575',
                'kapasitas' => '13.5 Kw',
                'brand_id' => 8,
                'work_place_id' => 1,
                'category_id' => 3,
                'type_id' => 2,
                'departement_id' => 2,
                'keterangan' => null,
                'image' => 'images/maintenances/Jp4Kqhr0Q85sxEEMoXXhCXSndWNOiBWbHlK21Rnm.jpg',
                'status' => 0,
                'creator_id' => 2,
                'created_at' => now(),
            ],
            
        ]);
    }
}
