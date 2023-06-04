<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

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
            return redirect('/home');
        }

        return redirect()->back()->withErrors(['email' => 'Invalid Credentials!']);
    }
}
