<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    use HasFactory;

    protected $fillable = [
        "day_id",
        "time_id",
        "room_id",
        "teacher_id",
        "courses_fos_id",
        "year"
    ];

    public function day(){
        return $this->belongsTo(Day::class);
    }

    public function time(){
        return $this->belongsTo(Time::class);
    }

    public function room(){
        return $this->belongsTo(Room::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function coursesFos(){
        return $this->belongsTo(CoursesFos::class);
    }
}
