<?php

namespace App\Http\Controllers;

use App\Models\events;
use Illuminate\Http\Request;

class User extends Controller
{
    public function UserPanel(){

        $events = events::all();

        return view('homeUser', [
            "events" => $events
        ]);
    }
}
