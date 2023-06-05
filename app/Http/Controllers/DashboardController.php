<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Psy\Readline\Hoa\Console as console;

class DashboardController extends Controller
{
    public function __invoke()
    {
        return view('landingPage.index', [
            'user' => Auth::user()
        ]);
    }

    public function team()
    {
        return view('team', [
            'user' => Auth::user()
        ]);
    }
}
