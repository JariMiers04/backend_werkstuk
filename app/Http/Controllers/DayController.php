<?php

namespace App\Http\Controllers;

use App\Models\Day;
use Illuminate\Http\Request;

class DayController extends Controller
{
    // just a read -> days stay's the same


    public function getDays(){
        $days = Day::all();
    }
}
