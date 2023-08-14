<?php

namespace Database\Seeders;

use App\Models\HotelFacility;
use Illuminate\Database\Seeder;

class HotelFacilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        HotelFacility::truncate();
        $facilityRoom = [
            [
                'facility_name' => 'Kolam Renang',
                'detail' => 'Kolam renang dengan ukuran besar dan nyaman',
            ],
            [
                'facility_name' => 'Gym',
                'detail' => 'Gym dengan nuansa asik modern',
            ],
            [
                'facility_name' => 'Sauna',
                'detail' => 'bagus pokoknya',
            ],
            [
                'facility_name' => 'Caffe In Hotel',
                'detail' => 'bagus pokoknya',
            ],
            [
                'facility_name' => 'Toy Museum',
                'detail' => 'bagus pokoknya',
            ],
            [
                'facility_name' => 'Sport Area',
                'detail' => 'bagus pokoknya',
            ],

        ];

        foreach ($facilityRoom as $key => $value){
            HotelFacility::create($value);
        }
    }
}
