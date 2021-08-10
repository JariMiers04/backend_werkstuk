<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use function GuzzleHttp\Promise\all;

class UserController extends Controller
{
    // is Admin User? => Permissions

    public function getUser(){
        $users = User::all();
        return view("layouts/users", ['users'=>$users]);
    }


//    New User? -> create and what
    public function addUser(Request $request){
//        validation -> extra safe password validation https://stackoverflow.com/questions/31539727/laravel-password-validation-rule
        $request->validate([
            "name" => 'required|string|max:25',
            "email" => "required|email|max:50",
            "password" => "required|string|min:8|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/|
               confirmed",
//            maybe password confirmation
        ]);

//        new user
        $user = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password)
        ]);

//        check if new user is an admin
        $request->has("adminUser") ? $user->assignRole("admin") : $user->assignRole("teacher");

        return redirect()->route("users", ["users"=> User::all()]);
    }


//    Update an User

    public function updateUser(Request $request){
        $password = $request->password;

//        input password validation
        if($password == ""){
            $request->validate([
                "name" => "required|string|max:25"
            ]);
        } else{
            $request->validate([
                "name" => "required|string|max:25",
                "password" =>  "required|string|min:8|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/|
               confirmed"
            ]);
        }

        return redirect()->route('profile');
    }

//    delete user

public function deleteUser(Request $request){
    $deleteUserId = $request->idkyet;
    $user = User::find($deleteUserId);

//    verder afwerken


    return redirect()->route("users", ["users" => User::all()]);
}

//  update nonAvailabilities

public function updateNonAvailabilities(Request $request){

        return redirect()->route("profile");
}


}
