@extends('layouts.main') @section('content')

<form action="/login" method="POST" class="m-3">
    @csrf
    
    @include('layouts.errors')
    
    <div class="form-group">
        <label for="email">Email address:</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" />
    </div>
    
    <div class="form-group">
        <label for="password">password:</label>
        <input type="password" id="password" name="password" class="form-control" placeholder="password" />
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-primary" value="Login" />
        <a href="{{route('register')}}" class="btn btn-default"> Signup </a>
    </div>
</form>

@endsection