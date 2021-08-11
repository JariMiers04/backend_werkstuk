<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

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
        $adminRole = Role::create([
            "name" => "admin"
        ]);

//        Teacher Roles
        $teacherRole = Role::create([
            "name"=>"teacher"
        ]);
//        Create Permission for Own Data
        $manageOwnData = Permission::create([
            "name"=> "manageOwnData"
        ]);

//        Permission for All Data
        $manageAllData = Permission::create([
            "name"=>"manageAllData"
        ]);

// link roles to permissions -> https://spatie.be/docs/laravel-permission/v4/introduction
        $adminRole->givePermissionTo($manageAllData);
        $teacherRole->givePermissionTo($manageOwnData);

//        linken met bestaande users -> credit to Wouter hiervoor -> werkt niet
        User::find(1)->assignRole("admin");
        User::find(2)->assingRole("teacher");

    }
}
