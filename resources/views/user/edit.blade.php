@extends('layouts.main')

@section('content')

    <form action="/users/update/{{$user->id}}" method="POST" class="mt-3">
        @csrf
        @include('layouts.errors')
        
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" class="form-control" id="title" name="username" placeholder="username"
                value="{{$user->name}}"/>
        </div>
        
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="email"
                value="{{$user->email}}"/>
        </div>
    

        <div class="form-group">
            <input type="submit" class="btn btn-success" value="update" />
        </div>
    </form>

@endsection