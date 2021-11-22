@extends('layouts.app')

@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
@endsection
@section('content')

<div class="wrapper mt-20">
    
    <div class="clearfix">
        <div class="left">
            <h2>Manage Theaters</h2>
        </div>
        <div class="right">
            <a class="button" href="{{ url('/') }}"> Back</a>
        </div>
    </div>

    <div class="mt-20">
        <a href="{{route('theater.create') }}" class="button">
            Create New Theater
        </a>
    </div>

    <div class="mt-20 clearfix">
        @foreach ($theaters as $theater)
            <div class="theaters">{{ $theater->name }}
                <a href="{{route('theater.delete', $theater->id) }}" class="button button2">Delete</a>
            </div>
        @endforeach
    </div>
    
</div>
@endsection

