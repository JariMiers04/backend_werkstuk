<?php

use App\Http\Controllers\BlockController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DayController;
use App\Http\Controllers\FieldsOfStudyController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('layouts/dashboard');
})->middleware(['auth'])->name('dashboard');


//Route for the  admin visualization of the timetables and profile
//
Route::group(['middleware' => 'auth'], function () {
//    showing so getting we need to call the get function in de controller class -> https://laravel.com/docs/8.x/controllers#controller-middleware
    Route::get('/timetable', [BlockController::class, 'getBlocks'])->name('timetable');

//   add a block
    Route::post("/addBlock", [BlockController::class, 'addBlock'])->name("addBlock");

//    delete a block
    Route::post('/deleteBlock', [BlockController::class, "deleteBlock"])->name("deleteBlock");


    //    profile page
    Route::get("/profile", [DayController::class, "getDaysAndNonAvailabilities"])->name("profile");

    Route::post('/updateNonAvailabilities', [UserController::class, "updateNonAvailabilities"])->name("updateNonAvailabilities");

});

// USERS

Route::group(["prefix" => 'users', 'middleware' => 'auth'], function () {
//    get
    Route::get("/", [UserController::class, "getUser"])->name("getUser");

//    add user as admin
    Route::view("/addUserAdmin", "auth/register")->name("addUserAdmin");
//    new
    Route::post("/register", [UserController::class, "addUser"])->name('addUser');
//    update
    Route::post("/updateUser", [UserController::class, "updateUser"])->name("updateUser");
//    delete
    Route::post("/deleteUser", [UserController::class, "deleteUser"])->name("deleteUser");
});


// COURSES

Route::group(["prefix" => "courses", "middleware" => "auth"], function () {
//    get courses
    Route::get("/", [CourseController::class, "getCourses"])->name("getCourses");
//    add course
    Route::post("/addCourse", [CourseController::class, "addCourse"])->name("addCourse");
//    update course
    Route::post("/updateCourse", [CourseController::class, "updateCourse"])->name("updateCourse");
//    delete course
    Route::post("/deleteCourse", [CourseController::class, "deleteCourse"])->name("deleteCourse");
});


// FIELDS OF STUDY

Route::group(["prefix" => "fieldOfStudy", "middleware" => "auth"], function () {
    Route::get("/", [FieldsOfStudyController::class, "getFieldOfStudy"])->name("getFieldOfStudy");
//    new
    Route::post("/addFieldOfStudy", [FieldsOfStudyController::class, "addFieldOfStudy"])->name("addFieldOfStudy");
//    delete
    Route::post("/deleteFieldOfStudy", [FieldsOfStudyController::class, "deleteFieldOfStudy"])->name("deleteFieldOfStudy");
});


require __DIR__ . '/auth.php';

