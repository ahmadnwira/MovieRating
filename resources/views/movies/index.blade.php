@extends('layouts.main')

@section('content')
    <div class="row mt-3">
        @foreach($movies as $movie)
            <div class="col-md-4">       
                <div class="card">
                    <img class="card-img-top" src="{{$movie->image}}">

                    <div class="card-body">
                        <h5 class="card-title">{{$movie->title}}</h5>
                        <a href="movies/show/{{$movie->id}}">More</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection