@extends('layouts.main')

@section('content')

    <form action="/movies" method="POST" class="mt-3" enctype="multipart/form-data">
        @csrf
        @include('layouts.errors')
        
        <div class="form-group">
            <label for="title">Movie Title:</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Title" />
        </div>
        
        <div class="form-group">
            <label for="director">Director:</label>
            <input type="text" class="form-control" id="director" name="director" placeholder="Director" />
        </div>
    
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control"  id="description" name="description" rows="4" cols="50"> </textarea>
        </div>
    
        <div class="form-group">
            <label for="image">Poster:</label>
            <input type="file" class="form-control" name="image" id="image">
        </div>

        <div class="form-group">
            <input type="submit" class="btn btn-success" value="Save" />
        </div>
    </form>

@endsection