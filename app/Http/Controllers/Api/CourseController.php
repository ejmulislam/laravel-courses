<?php

namespace App\Http\Controllers\Api;

use App\Models\Topic;
use App\Models\Course;
use App\Models\Series;
use App\Models\Platform;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CourseController extends Controller
{
    public function index() {
        $courses = Course::latest()->take(12)->get();
        return response()->json($courses);
    }

    public function allcourses(Request $request) {
        $courses = Course::where(function ($query) use($request){
            if(!empty($request->search)) {
                $query->where('name', 'like', '%' . $request->search . '%');
            }

            if(!empty($request->duration)) {
                $duration = [];
                if(in_array('1h-5h', $request->duration)) {
                    $duration[] = 0;
                }
                if(in_array('5h-10h', $request->duration)) {
                     $duration[] = 1;
                }
                if(in_array('10h+', $request->duration)) {
                    $duration[] = 2;
                }
                if(!empty($duration)) {
                    $query->whereIn('duration', $duration);
                }
            }

            if(!empty($request->level)) {
                $level = [];
                if(in_array('1h-5h', $request->level)) {
                    $level[] = 0;
                }
                if(in_array('5h-10h', $request->level)) {
                    $level[] = 1;
                }
                if(in_array('10h+', $request->level)) {
                    $level[] = 2;
                }
                if(!empty($level)) {
                    $query->whereIn('level', $level);
                }
            }
        })->paginate(12);

        $platform = Platform::select(['id', 'name'])->get();
        $series = Series::select(['id', 'name'])->get();
        $topic = Topic::select(['id', 'name'])->get();

        return response()->json([
            'courses' => $courses,
            'platform' => $platform,
            'series' => $series,
            'topic' => $topic
        ]);
    }

    public function single($slug) {
        $course = Course::where('slug', $slug)->first();
        return response()->json($course);
    }
}
