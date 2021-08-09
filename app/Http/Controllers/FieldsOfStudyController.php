<?php

namespace App\Http\Controllers;

use App\Models\FieldsOfStudy;
use Illuminate\Http\Request;

class FieldsOfStudyController extends Controller
{
//    getField

public function getFieldOfStudy(){
    $fieldOfStudy = FieldsOfStudy::all();
}

    // create new Field of Study
     public function addFieldOfStudy(Request $request){
    $request = FieldsOfStudy::create([

    ]);
     }

    // delete field of Study
    public function deleteFieldOfStudy(Request $request){
    }

//    update
    public function updateFieldOfStudy(Request $request){

    }



}
