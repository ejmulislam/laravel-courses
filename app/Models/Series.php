<?php

namespace App\Models;

use App\Models\Course;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Series extends Model
{
    use HasFactory;
    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_series', 'series_id', 'course_id');
    }
}
