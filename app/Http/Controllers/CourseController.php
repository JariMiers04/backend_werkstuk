<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Day;
use App\Models\FieldsOfStudy;
use App\Models\Time;
use App\Models\User;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    // read all the courses

    public function getCourses(){
        $courses = Course::all();
        $fieldOfStudy = FieldsOfStudy::all();
        $users = User::all();
        $days = Day::all();
        $times = Time::all();

        return view("layouts.courseAndFieldOfStudy", ["courses" => $courses, "fieldOfStudy" => $fieldOfStudy, "users"=>$users, "days"=>$days, "times"=>$times]);
    }

    // add a course

    public function addCourse(Request $request){
//        validation to add a new course in db
        $request->validate([
            "name" => "string|max:40:unique:courses"
        ]);

        Course::create([
           'name' => $request->name
        ]);

        return redirect()->route("courses");
    }

    // update a course -> change amount of houres?

    public function updateCourse(Request $request){
        $name = $request->name;

        if($name == ""){
            $request->validate([
                "name" => "required|string|max:40|unique:courses"
            ]);
        }

        return redirect()->route("courses");
    }

    // delete course(s)

    public function deleteCourse(Request $request){


        return redirect()->route('courses');
    }
}
