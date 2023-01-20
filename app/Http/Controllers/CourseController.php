<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Platform;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function show($slug) {
        $course = Course::where('slug', $slug)->with(['platform', 'series', 'topics', 'authors', 'reviews'])->first();

        //return response()->json($course);

        if(empty($course)) {
            return abort(404);
        }

        return view('course.single', [
            'course' => $course,
        ]);
    }
}
