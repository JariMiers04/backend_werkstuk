<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NonAvailability extends Model
{
    use HasFactory;

    protected $fillable = [
        "day_id",
        "user_id",
        "time_id"
    ];

    public function user(){
        return $this->belongsTo(User::class)->withDefault();
    }

    public function day(){
        return $this->belongsTo(Day::class)->withDefault();
    }

    public function time(){
        return $this->belongsTo(Time::class)->withDefault();
    }
}
