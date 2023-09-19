<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $instractors_ids = User::where('type', 'instractor')->pluck('id')->toArray();
        $instractors = Employee::whereIn('user_id', $instractors_ids)->get();
        $data = [];
        foreach ($instractors as $instractor) {
            $data[$instractor->id] = $instractor->user->name;
        }
        dd($data);
        // dd($instractors_ids);
    }
}
