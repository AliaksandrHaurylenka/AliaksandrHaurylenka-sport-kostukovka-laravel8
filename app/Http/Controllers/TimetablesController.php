<?php

namespace App\Http\Controllers;

use App\Models\Timetable;

class TimetablesController extends Controller
{
    public function index()
    {
    	$timetable = Timetable::all();
        return view('site.timetable', compact('timetable'));
    }
}
