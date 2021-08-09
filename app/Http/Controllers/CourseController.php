<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    // read all the courses

    public function getCourses(){
        $courses = Course::all();
    }

    // add a course

    public function addCourse(Request $request){
        Course::create([
           'name' => $request->name
        ]);
    }

    // update a course -> change amount of houres?

    public function updateCourse(Request $request){

    }

    // delete course(s)

    public function deleteCourse(Request $request){

    }
}
