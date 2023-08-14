<?php

namespace Database\Seeders;

use App\Models\RoomFacility;
use Illuminate\Database\Seeder;

class RoomFacilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RoomFacility::truncate();
        $facilityRoom = [
            [
                'facility_name' => 'AC',
            ],
            [
                'facility_name' => 'TV',
            ],
            [
                'facility_name' => 'Kulkas',
            ],
            [
                'facility_name' => 'Wi-fi',
            ],
        ];

        foreach ($facilityRoom as $key => $value){
            RoomFacility::create($value);
        }
    }
}
