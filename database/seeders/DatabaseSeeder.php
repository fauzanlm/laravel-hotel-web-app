<?php

namespace Database\Seeders;

use App\Models\Log;
use App\Models\Payment;
use App\Models\Transaction;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Transaction::truncate();
        Payment::truncate();
        Log::truncate();
        $this->call([
            UserSeeder::class,
            RoomFacilitySeeder::class,
            RoomSeeder::class,
            RoomTypeSeeder::class,
            HotelFacilitySeeder::class,
        ]);
    }
}
