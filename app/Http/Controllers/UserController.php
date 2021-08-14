<?php

namespace App\Http\Controllers;

use App\Models\Day;
use App\Models\NonAvailability;
use App\Models\Time;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
            "password" => "required|string|min:8|confirmed",

//|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/
//            maybe password confirmation
        ]);

//        new user
        $user = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password)
        ]);

//        check if new user is an admin
        $request->has("userAdmin") ? $user->assignRole("admin") : $user->assignRole("teacher");

        return redirect()->route("getUser");
    }


//    Update an User

    public function updateUser(Request $request){
        $user = User::findOrFail($request->id);

        $password = Hash::make($request->new_password);

//        input password validation
        if($password == ""){
            $request->validate([
                "name" => "required|string|max:25"
            ]);
        } else{
            $request->validate([
                "name" => "required|string|max:25",
                "new_password" =>  "required|string|min:8|confirmed"
//                    |regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/|
            ]);
        }

        $user->password = $password;
        $user->save();

        return redirect()->route('profile');
    }

//    delete user

public function deleteUser(Request $request){

    $deleteUserId = $request->deleteUser;
    User::find($deleteUserId)->delete();

    return redirect()->route("getUser");
}

//  update nonAvailabilities

// credits Wouter Heirstrate om dit uit te leggen inclusief de blade hiervoor

public function updateNonAvailabilities(Request $request){

        $arrayCheckbox = $request->availabilities;

        $user= Auth::user();
        $user->nonAvailability()->delete();

        if($arrayCheckbox !=null){
            foreach ($arrayCheckbox as $checkbox){
                $dayId = explode('-',$checkbox)[0];
                $timeId = explode('-',$checkbox)[1];
                $day = Day::find($dayId);
                $time = Time::find($timeId);

                $nonav = NonAvailability::FirstOrCreate(
                    ['day_id'=> $day->id,'time_id'=>$time->id, 'user_id'=>$user->id]);
/*
//                new nonavailability
                $nonav = new NonAvailability();
                $nonav->day()->associate($day);
                $nonav->time()->associate($time);
                $nonav->user()->associate($user);

                $nonav->save();*/
            }
        }



        return redirect()->route("profile", ['days'=>Day::all(), "nonAvailabilities" => $user->nonAvailability]);
}


}
