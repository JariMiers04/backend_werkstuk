<?php

namespace App\Http\Controllers;

use App\Models\Block;
use App\Rules\BlockRoomAvailabilityRule;
use App\Rules\BlockUserAvailabilityRule;
use Illuminate\Http\Request;

class BlockController extends Controller
{
    // read the blocks

    public function getBlocks(){
        $block = Block::all();
    }

    // add a block

    public function addBlock(Request $request){
        $block = Block::create([

            $request->validate([
                "room" => new BlockRoomAvailabilityRule(),
                "users"=> new BlockUserAvailabilityRule()
            ])

        ]);

        return redirect()->route("timetable");
    }

    // delete a block

    public function deleteBlock(Request $request){

    }
}
