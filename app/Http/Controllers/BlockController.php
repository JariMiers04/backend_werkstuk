<?php

namespace App\Http\Controllers;

use App\Models\Block;
use App\Models\CoursesFos;
use App\Models\Room;
use App\Rules\BlockRoomAvailabilityRule;
use App\Rules\BlockUserAvailabilityRule;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class BlockController extends Controller
{
    // read the blocks

    public function getBlocks(){
        $block = Block::all();
    }

    // add a block

    public function addBlock(Request $request, Permission $permission){

        $request->validate([
            "room" => new BlockRoomAvailabilityRule(),
            "users"=> new BlockUserAvailabilityRule(),
            "times" => "required|integer|min:1|max:7",
            "year" => "required|integer|min:2021",
        ]);

        $permission = new Permission;

//        $times = $request->times;
//        $year = $request->fieldsOfStudyYear;
        $block = Block::create([

//            $permission->users = $request->users,
//            $permission->times = $request->times,
//            $permission->days = $request->days,
//            $permission->year = $request->users,
//            $permission->room = new Room(),
//            $permission
            "users" => $request->users,
            "times" => $request->times,
            "days" => $request->days,
            "rooms" => new Room(),
            "courses_fos" => new CoursesFos()
        ]);

        $permission->save();
        $block->save();

        return redirect()->route("timetable");
    }

//    // delete a block
//
//    public function deleteBlock(Request $request){
//
//    }
}
