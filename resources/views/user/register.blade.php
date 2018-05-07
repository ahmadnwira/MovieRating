@extends('layouts.main')

@section('content')

    <form action="/register" method="POST" class="m-3">
        @include('layouts.errors')
        @csrf
        
        <div class="form-group">
            <label for="name">username:</label>
            <input type="text" id="name" name="name" class="form-control"  placeholder="john doe"/>
        </div>
        <div class="form-group">
            <label for="email">Email address:</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" />
        </div>

        <label for="password">password:</label>
        <input type="password" id="password" name="password" class="form-control" placeholder="password"/>

        <div class="form-group">
            <label for="password_confirmation">Confirm Password:</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"  placeholder="confirm password"/>
        </div>

        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="singup" />
            <a href="{{route('login')}}" class="btn btn-default"> Login </a>
        </div>
    </form>

@endsection