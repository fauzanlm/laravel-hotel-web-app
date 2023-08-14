<?php

namespace Database\Seeders;

use App\Models\RoomType;
use Illuminate\Database\Seeder;

class RoomTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RoomType::truncate();
        $roomType = [
            [
                'name' => 'Standard Room',
                'price' => '200000',
                'facilities' => 'AC, TV',
                'information' => 'Biasanya, kamar tipe ini dibanderol dengan harga yang relatif murah. Fasilitas yang ditawarkan pun standar seperti kasur ukuran king size atau dua queen size. Namun, penawaran yang diberikan tergantung pada masing-masing hotel. Standard room hotel bintang 1 dan bintang 5 tentu berbeda.',
                'foto' => 'standard-room.jpg',
            ],
            [
                'name' => 'Superior Room',
                'price' => '300000',
                'facilities' => 'AC, TV, Kulkas',
                'information' => 'Pada dasarnya, superior room adalah tipe kamar yang sedikit lebih baik dari tipe standard room. Perbedaannya dapat berupa dari fasilitas yang diberikan, interior kamar, atau pemandangan dari kamar.',
                'foto' => 'superior-room.jpg',
            ],
            [
                'name' => 'Deluxe Room',
                'price' => '400000',
                'facilities' => 'AC, TV, Kulkas, Wi-fi',
                'information' => 'Di atas tipe kamar hotel superior room adalah deluxe room. Kamar ini tentu memiliki kamar yang lebih besar. Tersedia pilihan kasur yang bisa kamu pilih, double bed atau twin bed. Biasanya, dari segi interior kamar ini terkesan lebih mewah.',
                'foto' => 'deluxe-room.jpg',
            ],
        ];

        foreach ($roomType as $key => $value){
            RoomType::create($value);
        }
    }
}
