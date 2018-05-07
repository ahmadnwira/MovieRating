<?php

namespace App\Http\Controllers;

use App\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('movies.index', ['movies'=>Movie::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('movies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
        
        return redirect(route('movies'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {
        return view('movies.show', ['movie'=>$movie]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
        return view('movies.edit', ['movie'=>$movie]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
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
        return redirect(route('movies'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {   
        if(!file_exists(public_path($movie->image)))
        {
            return redirect('movies');
        }
        unlink(public_path($movie->image));
        $movie->delete();
        return redirect(route('movies'));
    }
}
