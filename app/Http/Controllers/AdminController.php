<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Movie;
use App\User;

class AdminController extends Controller
{
    public function movies()
    {
        return view('admin.movies', ['movies'=>Movie::all()]);
    }

    public function users()
    {
        return view('admin.users', ['users'=>User::all()]);
    }
}
