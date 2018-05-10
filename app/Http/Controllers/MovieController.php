<?php

namespace App\Http\Controllers;

use App\Movie;
use App\Rating;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function index()
    {
        return view('movies.index', ['movies'=>Movie::all()]);
    }

    public function create()
    {
        return view('movies.create');
    }


    public function store(Request $request)
    {
        $this->validate(request(),[
            'title'=>'required|max:140|min:2',
            'director'=>'required|min:4|max:100',
            'description'=>'required',
            'image'=>'required|image|mimes:jpeg,jpg,png|max:2000'
        ]);

        $image = $request->all()['image'];

        $imageName = rand(0,100).time().'.'.$image->getClientOriginalExtension();

        $image->move('img', $imageName);
        
        $data = [
            'user_id'=>auth()->id(),
            'title'=>request('title'),
            'description'=>request('description'),
            'director'=>request('director'),
            'image'=>'/img/'.$imageName
        ];

        Movie::create($data);
        
        return redirect(route('index'));
    }

    public function show(Movie $movie)
    {
        return view('movies.show', ['movie'=>$movie]);
    }


    public function edit(Movie $movie)
    {
        return view('movies.edit', ['movie'=>$movie]);
    }

    public function update(Request $request, Movie $movie)
    {
        
        $this->validate(request(),[
            'title'=>'required|max:140|min:2',
            'director'=>'required|min:4|max:100',
            'description'=>'required',
            'image'=>'required|image|mimes:jpeg,jpg,png|max:2000'
        ]);

        $to_delte = $movie->image;

        $image = $request->all()['image'];

        $imageName = rand(0,100).time().'.'.$image->getClientOriginalExtension();

        $image->move('img', $imageName);
        
        $data = [
            'user_id'=>auth()->id(),
            'title'=>request('title'),
            'description'=>request('description'),
            'director'=>request('director'),
            'image'=>'/img/'.$imageName
        ];

        $movie->update($data);
        if(file_exists(public_path($to_delte)))
        {
            unlink(public_path($to_delte));
        }
        return redirect(route('index'));

    }

    public function destroy(Movie $movie)
    {   
        if(!file_exists(public_path($movie->image)))
        {
            return redirect('index');
        }
        unlink(public_path($movie->image));
        $movie->delete();
        return redirect(route('index'));
    }

    public function rate(Movie $movie, Request $request)
    {
        $this->validate($request, [
            'rate'=>'required|integer|min:1|max:5',
            'review' => 'max:140'
        ]);

        $user_review = $movie->ratings->where('user_id', '=', $request->user()->id);
        
        if(count($user_review) !== 0)
        {
            return back()->withErrors(['You already reviewed this movie before']);
        }

        $data = [
            'user_id' => $request->user()->id,
            'review' => $request->get('review') ?? '' ,
            'rate' => $request->get('rate'),
            'movie_id' =>  $movie->id
        ];
        
        Rating::create($data);
        $movie->update(['rating'=>$movie->ratings->avg('rate')]);
        return back();
    }
}
