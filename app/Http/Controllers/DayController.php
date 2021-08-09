<?php

namespace App\Http\Controllers;

use App\Models\Day;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DayController extends Controller
{
    // just a read -> days stay's the same


    public function getDaysAndNonAvailabilities(){
        $days = Day::all();
        $nonav = Auth::user()->nonav;
        return view('layouts.profile', ["days"=>$days, "nonAvailabilities" =>$nonav]);
    }
}
