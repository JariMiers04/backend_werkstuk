<?php

namespace Database\Seeders;

use App\Models\Day;
use Illuminate\Database\Seeder;

class DaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Day::create([
            'name'=>"Maandag"
        ]);

        Day::create([
            'name'=>"Dinsdag"
        ]);

        Day::create([
            'name'=>"Woensdag"
        ]);

        Day::create([
            'name'=>"Donderdag"
        ]);

        Day::create([
            'name'=>"Vrijdag"
        ]);
    }
}
