<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class AppsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function app()
    {
        return view('layouts.app');
    }

}
