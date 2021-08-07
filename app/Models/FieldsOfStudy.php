<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FieldsOfStudy extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "year"
    ];

    public function course(){
        return $this->belongsToMany(Course::class);
    }
}
