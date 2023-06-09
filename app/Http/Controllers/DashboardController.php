<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Psy\Readline\Hoa\Console as console;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $user = Auth::user();
        $datas = Artikel::get();

        return view('landingPage.index', compact('user', 'datas'));
    }

    public function adminView()
    {
        return view('admin.index', [
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
