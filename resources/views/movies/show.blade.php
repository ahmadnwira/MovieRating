@extends('layouts.main')

@section('content')
    <div class="row mt-3">

        <div class="col-md-4">       
            <div class="card">
                <img class="card-img-top" src="{{$movie->image}}">
            </div>
        </div>

        <div class="col-md-8">
            <h3>Title: {{$movie->title}}</h3>
            <p>Rating: {{$movie->rating}}</p>
            <p>Director: {{$movie->director}}</p>
            <p>Description: {{$movie->description}}</p>
            
            @if(auth()->id())
                @include('layouts.rate_form')
            @endif

            <h4 class="lead">Reviews</h4> <hr>

            @foreach($movie->ratings as $rating)
                @if(!empty($rating->review))
                    <div class="card mb-1 p-1">
                        <p class="card-text">
                            review: {{$rating->review}}
                            <span class="badge badge-pill badge-primary"> {{$rating->rate}} </span> 
                        </p>
                    </div>        
                @endif
            @endforeach

        </div>
    </div>
@endsection