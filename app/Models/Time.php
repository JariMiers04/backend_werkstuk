<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    use HasFactory;

    protected $fillable = [
        "start_time",
        "end_time"
    ];

    public function nonAvailability(){
        return $this->hasMany(NonAvailability::class);
    }

    public function block(){
        return $this->hasMany(Block::class);
    }
}
