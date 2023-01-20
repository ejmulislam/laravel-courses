<?php

namespace App\Http\Controllers;

use App\Models\Series;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index($slug) {
        $series = Series::where('slug', $slug)->first();

        //series courses paginate
        $courses = $series->courses()->paginate(12);
        return view('series.single', [
            'series' => $series,
            'courses' => $courses,
        ]);
    }
}
