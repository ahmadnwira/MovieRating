@extends('layouts.main') @section('content')
    <div class="row mt-3">
        <div class="col-md-8">
            <ul class="list-group">
                @foreach($users as $user)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a href="/users/edit/{{$user->id}}">{{$user->name}}</a>
                    <a class="btn btn-danger" href="/users/destroy/{{$user->id}}">Delate</a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection