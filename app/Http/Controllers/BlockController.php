<?php

namespace App\Http\Controllers;

use App\Models\Block;
use App\Models\Course;
use App\Models\CoursesFos;
use App\Models\Day;
use App\Models\FieldsOfStudy;
use App\Models\Room;
use App\Models\Time;
use App\Rules\BlockRoomAvailabilityRule;
use App\Rules\BlockUserAvailabilityRule;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class BlockController extends Controller
{
    // read the blocks

    public function getBlocks(){
        $blocks = Block::all();
        $days = Day::all();
        $times = Time::all();

        return view("layouts/dashboard", ['blocks' => $blocks, 'days' => $days, "times"=>$times]);
    }

    // add a block

    public function addBlock(Request $request){

        $request->validate([
            "room" => new BlockRoomAvailabilityRule($request->days),
            "users"=> new BlockUserAvailabilityRule($request->days),
            "days" => "required|string",
            "times" => "required|integer|min:1|max:7",
            "fieldsOfStudyYear" => "required|integer",
        ]);

        $user = \App\Models\User::find($request->users);
        $fieldOfStudy = FieldsOfStudy::find($request->fieldsOfStudy);
        $course = Course::find($request->courses);
        $year = $request->fieldsOfStudyYear;
        $day = Day::find($request->days);
        $room = Room::all();
        $time = Time::find($request->times);


        $coursesFos = CoursesFos::firstOrCreate([
            "course_id" => $course->id,
            "fields_of_study_id" =>$fieldOfStudy->id
        ]);

        $block = new Block();
        $block->user()->associate($user);
        $block->coursesFos()->associate($coursesFos);
        $block->day()->associate($day);
        $block->time()->associate($time);
        $block->room()->associate(Room::create());
        $block->year = $year;

        $block->save();

        return redirect()->route("dashboard");
    }
}
