<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function create()
    {
        return view('coruses.create');
    }
    public function store(Request $request)
    {
        dd($request->all());
    }
}
