<?php

namespace Database\Seeders;

use App\Models\Time;
use Illuminate\Database\Seeder;

class TimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $times = [
            '08.00', '09.00', '10.00', '11.00', '12.00',
            '13.00', '14.00', '15.00', '16.00', '17.00'
        ];

        foreach ($times as $time) {
            Time::create(['waktu' => $time]);
        }
    }
}
