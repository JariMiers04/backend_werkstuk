<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    // read all the courses

    public function getCourses(){
        $courses = Course::all();

        return view("layouts.courseAndFieldOfStudy", ["courses" => $courses]);
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
