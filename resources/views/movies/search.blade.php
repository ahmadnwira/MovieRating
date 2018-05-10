@extends('layouts.main')

@section('content')

    @if(count($movies))
        <h1>We found {{count($movies)}} matching results: </h1> <hr>
        <ul class="list-group mt-3">
            @foreach($movies as $movie)
                <li class="list-group-item">
                    <a href="/movies/show/{{$movie->id}}">{{$movie->title}}</a>
                    <p>Directed by: <mark>{{$movie->director}}</mark></p>
                    <p>A movie about {{$movie->description}}</p>
                </li>
            @endforeach
        </ul>
    @else
        <h3 class="alert alert-warning mt-3">couldn't find any movies matches your searhc</h3>
    @endif
@endsection