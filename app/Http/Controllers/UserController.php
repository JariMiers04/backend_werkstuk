<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // is Admin User? => Permissions


//    New User? -> create and what and create new admin user
    public function addUser(Request $request){
        $user = User::create([

        ]);
    }


//    Update an User

    public function updateUser(Request $request){

    }

//    Delete an User

    public function deleteUser(Request $request){

    }


}
