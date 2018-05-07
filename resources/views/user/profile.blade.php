@extends('layouts.main')

@section('content')
    @if(auth()->id() === 1)
        @include('admin.dashboard')
    @endif
@endsection