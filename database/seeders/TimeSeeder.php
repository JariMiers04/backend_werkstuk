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
        Time::create([
            "start_time" => '8:30',
            "end_time" => '9:20'
        ]);

        Time::create([
            "start_time" => '9:20',
            "end_time" => '10:10'
        ]);

        Time::create([
            "start_time" => '10:20',
            "end_time" => '11:10'
        ]);

        Time::create([
            "start_time" => '11:10',
            "end_time" => '12:00'
        ]);

        Time::create([
            "start_time" => '12:55',
            "end_time" => '13:45'
        ]);

        Time::create([
            "start_time" => '13:45',
            "end_time" => '14:35'
        ]);

        Time::create([
            "start_time" => '14:45',
            "end_time" => '15:35'
        ]);

        Time::create([
            "start_time" => '15:35',
            "end_time" => '16:25'
        ]);




    }
}
