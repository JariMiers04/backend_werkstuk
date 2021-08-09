<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // reference to Wouter, gaf mij de tip om eerst de vakken in de db te steken

        Course::create([
            'name'=>'Wiskunde'
        ]);

        Course::create([
            'name'=>'Economie'
        ]);

        Course::create([
            'name'=>'Frans'
        ]);

        Course::create([
            'name'=>'Engels'
        ]);

        Course::create([
            'name'=>'Aardrijkskunde'
        ]);

        Course::create([
            'name'=>'Nederlands'
        ]);

        Course::create([
            'name'=>'Geschiedenis'
        ]);

        Course::create([
            'name'=>'Latijn'
        ]);

        Course::create([
            'name'=>'Chemie'
        ]);

        Course::create([
            'name'=>'Fysica'
        ]);

        Course::create([
            'name'=>'LO'
        ]);

        Course::create([
            'name'=>'Grieks'
        ]);

        Course::create([
            'name'=>'Techniek'
        ]);
    }
}
