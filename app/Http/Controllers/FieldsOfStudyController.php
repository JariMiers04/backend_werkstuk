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

    $request->validate([
        "fosName"=> 'required|string|max:100',
        "fosYear" => "required|integer|min:1|max:7"
    ]);

    FieldsOfStudy::create([
        "name" => $request->fosName,
        "year" => $request->fosYear
    ]);

    return redirect()->route("getCourses");

     }

    // delete field of Study
    public function deleteFieldOfStudy(Request $request){

    $deleteFos = $request->deleteFos;
    FieldsOfStudy::find($deleteFos)->delete();

    return redirect()->route("getCourses");
    }

//    update
    public function updateFieldOfStudy(Request $request){

    }



}
