extends('layouts.app')
@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('css/reset.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/booking/style.css') }}">
@endsection

@section('content')
<div class="wrapper mt-20">

    <div class="clearfix">
        <div class="left">
            <h2>Statistics</h2>
        </div>
        <div class="right">
            <a class="button" href="{{ URL::previous() }}"> Back</a>
        </div>
    </div>
    <table class="report mt-20">
            <tr>
                <th>No</th>
                <th>User</th>
                <th>Movie</th>
                <th>Seats</th>
                <th>Showtime</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
            <!-- @foreach ($reports as $report)
            <tr>
                <td>{{ $report->id }}</td>
                <td>{{ $report->title }}</td>
                <td>{{ $report->income }}</td>
                <td>{{ $report->rating }}</td>
            </tr>
            @endforeach -->
    </table>

</div>
@endsection