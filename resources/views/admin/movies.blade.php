@extends('layouts.main')

@section('content')
    <div class="row mt-3">
        @foreach($movies as $movie)
            <div class="col-md-3">       
                <div class="card">
                    
                    <img class="card-img-top" src="{{$movie->image}}">
                    <div class="card-body text-center">
                            <p class="text-center">{{$movie->title}}</p>
                        <a href="/movies/edit/{{$movie->id}}" class="btn btn-primary">Edit</a>
                        <a href="/movies/destroy/{{$movie->id}}" class="btn btn-danger">Delete</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection