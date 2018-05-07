<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Movie;

class AdminController extends Controller
{
    public function movies()
    {
        return view('admin.movies', ['movies'=>Movie::all()]);
    }
}
