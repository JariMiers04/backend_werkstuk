<?php

namespace Database\Seeders;

use App\Models\FieldsOfStudy;
use Illuminate\Database\Seeder;

class FieldOfStudySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FieldsOfStudy::create([
            "name"=>"Latijn-Wiskunde",
            "year"=>1
        ]);

        FieldsOfStudy::create([
            "name"=>"Latijn-Grieks",
            "year"=>3
        ]);

        FieldsOfStudy::create([
            "name"=>"Economie-Wiskunde",
            "year"=>5
        ]);

        FieldsOfStudy::create([
            "name"=>"Sociale Wetenschappen",
            "year"=>2
        ]);
    }
}
