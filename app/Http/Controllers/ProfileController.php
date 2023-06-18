<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function show()
    {
        return view('login.index');
    }

    public function doLogout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function login()
    {
        validator((request()->all()), [
            'email' => ['required', 'email'],
            'password' => ['required']
        ])->validate();

        if (auth()->attempt(\request()->only(['email', 'password']))) {
            if (Auth::user()->role == 'Admin') {
                return redirect('/admin');
            };
            return redirect('/home');
        }
        alert()->warning('Error', 'Email atau Password salah');
        return redirect()->back();
    }
}
