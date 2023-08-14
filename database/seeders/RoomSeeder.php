<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Room::truncate();
        $room = [
            [
                'type_id' => '1',
                'number' => '101'
            ],
            [
                'type_id' => '1',
                'number' => '102'
            ],
            [
                'type_id' => '1',
                'number' => '103'
            ],
            [
                'type_id' => '1',
                'number' => '104',
            ],
            [
                'type_id' => '1',
                'number' => '105',
            ],
            [
                'type_id' => '1',
                'number' => '106'
            ],
            [
                'type_id' => '1',
                'number' => '107'
            ],
            [
                'type_id' => '1',
                'number' => '108'
            ],
            [
                'type_id' => '1',
                'number' => '109',
            ],
            [
                'type_id' => '1',
                'number' => '110',
            ],
            [
                'type_id' => '2',
                'number' => '201'
            ],
            [
                'type_id' => '2',
                'number' => '202'
            ],
            [
                'type_id' => '2',
                'number' => '203'
            ],
            [
                'type_id' => '2',
                'number' => '204',
            ],
            [
                'type_id' => '2',
                'number' => '205',
            ],
            [
                'type_id' => '2',
                'number' => '206'
            ],
            [
                'type_id' => '2',
                'number' => '207'
            ],
            [
                'type_id' => '2',
                'number' => '208'
            ],
            [
                'type_id' => '2',
                'number' => '209',
            ],
            [
                'type_id' => '2',
                'number' => '210',
            ],
            [
                'type_id' => '3',
                'number' => '301'
            ],
            [
                'type_id' => '3',
                'number' => '302'
            ],
            [
                'type_id' => '3',
                'number' => '303'
            ],
            [
                'type_id' => '3',
                'number' => '304',
            ],
            [
                'type_id' => '3',
                'number' => '305',
            ],
            [
                'type_id' => '3',
                'number' => '306'
            ],
            [
                'type_id' => '3',
                'number' => '307'
            ],
            [
                'type_id' => '3',
                'number' => '308'
            ],
            [
                'type_id' => '3',
                'number' => '309',
            ],
            [
                'type_id' => '3',
                'number' => '310',
            ],
        ];

        foreach ($room as $key => $value){
            Room::create($value);
        }
    }
}
