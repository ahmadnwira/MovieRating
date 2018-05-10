<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsContoller extends Controller
{
    public function create()
    {
        return view('user.login');
    }

    public function store()
    {

        if(auth()->attempt(request(['email', 'password'])))
        {
            return redirect(route('profile'));
        }

        return back();
        
    }

    public function destroy()
    {
        auth()->logout();
        return(redirect(route('index')));
    }
}
