@extends('layouts.app')
@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('css/reset.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/report/style.css') }}">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
@endsection

@section('content')
<div class="wrapper mt-20">

    <div class="clearfix">
        <div class="left">
            <h2>Statistics</h2>
        </div>
        <div class="right">
            <a class="button" href="{{ route('admin') }}"> Back</a>
        </div>
    </div>

    <div class="mt-20 clearfix">
        <div class="left">
            <a class="button" href="{{ route('export') }}"> Export</a>
            <a class="button button2" href="{{ route('delete-export') }}"> Delete & Export</a>
        </div>
        <div class="right">
            <a class="button button2" href="{{route('report-chart') }}"> Chart</a>
        </div>
    </div>

    <div class="mt-20">
    <table class="report">
            <tr>
                <th>ID</th>
                <th>Movie Title</th>
                <th>Income</th>
                <th>Rating</th>
            </tr>
            @foreach ($reports as $report)
            <tr>
                <td>{{ $report->id }}</td>
                <td>{{ $report->title }}</td>
                <td>{{ $report->income }}</td>
                <td>{{ $report->rating }}</td>
            </tr>
            @endforeach
    </table>
    </div>

</div>
@endsection