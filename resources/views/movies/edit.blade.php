@extends('layouts.main')

@section('content')

    <form action="/movies/update/{{$movie->id}}" method="POST" class="mt-3" enctype="multipart/form-data">
        @csrf
        @include('layouts.errors')
        
        <div class="form-group">
            <label for="title">Movie Title:</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Title"
                value="{{$movie->title}}"/>
        </div>
        
        <div class="form-group">
            <label for="director">Director:</label>
            <input type="text" class="form-control" id="director" name="director" placeholder="Director"
                value="{{$movie->director}}"/>
        </div>
    
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control"  id="description" name="description" rows="4" cols="50"> 
                {{$movie->description}}
            </textarea>
        </div>
    
        <div class="form-group">
            <div class="row">
                <div class="col-md-8">
                    <label for="image">Poster:</label>
                    <input type="file" class="form-control" name="image" id="image">
                </div>
                <div class="col-md-4">
                    <img src={{$movie->image}} class="img-thumbnail">
                </div>
            </div>
        </div>

        <div class="form-group">
            <input type="submit" class="btn btn-success" value="update" />
        </div>
    </form>

@endsection