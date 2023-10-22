<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Support\Renderable|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function index()
    {
        if (auth()->user()->role === 'admin'){

            return redirect('/admin');

        };

        if (auth()->user()->role === 'user'){

            return redirect('/user');

        };

        if (auth()->user()->role === 'teacher'){

            return redirect('/teacher');

        };


    }
}
