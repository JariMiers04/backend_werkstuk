<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoursesFos extends Model
{
    use HasFactory;

    protected $fillable = [
        "course_id",
        "fields_of_study_id"
    ];

    public function user(){
        return $this->hasOne(User::class);
    }

    public function block(){
        return $this->hasMany(Block::class);
    }
}
