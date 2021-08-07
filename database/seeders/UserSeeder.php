<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createUsers();
        $this->createRolesAndPermissions();
    }

    public function createUsers(){
        User::create([
            "name"=> "Mike Derycke",
            "email"=>"mike.derycke@ehb.be",
            "password"=>Hash::make("backendisawesome")
        ]);

        User::create([
            "name"=> "Jari Miers",
            "email"=>"jari.miers@student.ehb.be",
            "password"=>Hash::make("JariMiers")
        ]);
    }

    public function createRolesAndPermissions(){
//        Admin Roles

//        Teacher Roles

//        Create Permission for Own Data

//        Permission for All Data
    }
}
