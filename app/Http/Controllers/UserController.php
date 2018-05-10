<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['profile']]);
        $this->middleware('guest', ['only' => ['login', 'register']]);
    }

    public function create()
    {
        return view('user.register');
    }


    public function store()
    {
        $this->validate(request(),[
            'name'=>'required|min:3|max:100',
            'email'=>'required|email',
            'password'=>'required|confirmed|min:6|max:24'
        ]);
        
        $user_data = [
            'name'=>request('name'),
            'email'=>request('email'),
            'password'=>bcrypt(request('password'))
        ];

        $user = User::create($user_data);
        
        auth()->login($user);

        return redirect(route('profile'));
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect(route('profile'));
    }

    public function edit(User $user)
    {
        return view('user.edit', ['user'=>$user]);
    }

    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'username'=>'required|min:3|max:100',
            'email'=>'required|email'
        ]);
        
        $data = [
            'name' => $request->username,
            'email'=> $request->email
        ];

        $user->update($data);

        return redirect(route('profile'));
    }

    public function profile()
    {   
        $reviews = User::find(auth()->id())->ratings;
        return view('user.profile', ['reviews'=>$reviews]);
    }
}
