<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index($course_name = null)
    {
        $schedules = Schedule::query();
        $schedules->whereHas('course', function ($course) use ($course_name) {
            $course->where('name', 'like', '%' . $course_name . '%');
        });

        dd($schedules->get());
    }
}
