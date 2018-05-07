@extends('layouts.main')

@section('content')
    <div class="row mt-3">
        <div class="col-md-4">       
            <div class="card">
                <img class="card-img-top" src="{{$movie->image}}">
            </div>
        </div>

        <div class="col-md-6">
            <h3>Title: {{$movie->title}}</h3>
            <p>Ratings: {{$movie->rating}}</p>
            <p>Director: {{$movie->director}}</p>
            <p>Description: {{$movie->description}}</p>
        </div>
    </div>
@endsection