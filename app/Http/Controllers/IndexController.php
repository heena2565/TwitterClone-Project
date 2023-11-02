<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;


class IndexController extends Controller
{
    /**
     * Show the profile for a given user.
     */
    public function index()
    {
        if (Auth::user()) {
            return redirect('/home');
        }
        return view('index');
    }
}
