<?php

namespace App\Http\Controllers;

use App\Models\events;
use Illuminate\Http\Request;

class Teacher extends Controller
{
    public function TeacherPanel(){

        $events = events::all();

        return view('homeTeacher', [
            "events" => $events
        ]);
    }
}
