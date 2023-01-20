<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use App\Models\Course;
use App\Models\Series;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $series = Series::take(4)->get();
        $courses = Course::take(6)->get();

        return view('welcome', [
            'series' => $series,
            'courses' => $courses,
        ]);
    }

    public function dashboard()
    {
        if(Auth::User()->type === 1) {
            return view('dashboard');
        }else{
            return redirect()->route('home');
        }
    }

    public function archive($archive_type, $slug)
    {
        $allowed_archive_type = ['series', 'duration', 'level', 'platform', 'topic'];

        if(!in_array($archive_type, $allowed_archive_type)) {
            return abort(404);
        }

        //durations check
        if($archive_type === 'duration') {
            $allowed_durations = ['1-5-hours', '5-10-hours', '10-plus-hours'];
            if(!in_array($slug, $allowed_durations)) {
                abort(404);
            }
        }

        //level check
        if($archive_type === 'level') {
            $allowed_level = ['beginner', 'intermediate', 'advanced'];
            if(!in_array($slug, $allowed_level)) {
                abort(404);
            }
        }

	    if($archive_type === 'series') {
            $item = Series::where('slug', $slug)->first();
            if(empty($item)) {
                return abort(404);
            }

            $title = 'Course on ' . $item->name;
            $courses = $item->courses()->paginate(12);
        }
        if($archive_type === 'topic') {
            $item = Topic::where('slug', $slug)->first();
            if(empty($item)) {
                return abort(404);
            }

            $title = 'Course on ' . $item->name;
            $courses = $item->courses()->paginate(12);
        }
	    if($archive_type === 'level') {
            if($slug == 'beginner') {
                $item = 'Beginner';
                $level_db_key = 0;
            }elseif($slug === 'intermediate') {
                $item = 'Indermediate';
                $level_db_key = 1;
            }else {
                $item = 'Advanced';
                $level_db_key = 2;
            }

            $title = $item;
            $courses = Course::where('level', $level_db_key)->first()->paginate(12);
        }
        if($archive_type === 'duration') {
            if($slug == '1-5-hours') {
                $item = '1-5 hours';
                $level_db_key = 0;
            }elseif($slug === '5-10-hours') {
                $item = '5-10 hours';
                $level_db_key = 1;
            }else {
                $item = '10+ hours';
                $level_db_key = 2;
            }

            $title = $item;
            $courses = Course::where('level', $level_db_key)->first()->paginate(12);
        }
        if($archive_type === 'platform') {
            if($slug == 'laracasts') {
                $item = 'Laracasts';
                $level_db_key = 0;
            }elseif($slug === 'laravel-daily') {
                $item = 'Laravel Daily';
                $level_db_key = 1;
            }else {
                $item = 'Codecourse';
                $level_db_key = 2;
            }

            $title = $item;
            $courses = Course::where('level', $level_db_key)->first()->paginate(12);
        }
	    return view('archive.single', [
            'title' => $title,
            'courses' => $courses,
        ]);
    }
}
