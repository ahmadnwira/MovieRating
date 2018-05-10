@extends('layouts.main') @section('content') 

<div class="jumbotron jumbotron-fluid pl-2">
    <h3>Welcome Back, {{auth()->user()->name}}</h3>
</div>

@if(auth()->id() === 1) 
    @include('admin.dashboard')
@else

<div class="row">
    @foreach($reviews as $review)
    <div class="col-md-6 mt-4">
        <div class="card">
            <div class="row">
                <div class="col-md-6">
                    <div class="card-img-bottom">
                        <img class="card-img" src="{{$review->movie->image}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card-block">
                        <h4 class="card-title">
                            <a href="movies/show/{{$review->movie->id}}">{{$review->movie->title}}</a>
                        </h4>
                        <hr>
                        <p class="card-text">Directed By: {{$review->movie->director}}</p>
                        <p class="card-text">{{$review->movie->description}}</p>
                        <p class="card-text">Your review : {{$review->review}} | {{$review->rate}}.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

@endif
@endsection