<?php

namespace App\Http\Controllers;

use App\Models\Block;
use Illuminate\Http\Request;

class BlockController extends Controller
{
    // read the blocks

    public function getBlocks(){
        $block = Block::all();
    }

    // add a block

    public function addBlock(){
        $block = Block::create([

        ]);
    }

    // delete a block

    public function deleteBlock(Request $request){

    }
}
