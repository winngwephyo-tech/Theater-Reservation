@extends('layouts.app')
@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('css/reset.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/Report/style.css') }}">
<link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">
@endsection

@section('script')
<script src="{{ asset('js/lib/jquery.min.js') }}"></script>
<script src="{{ asset('js/lib/sweetalert.min.js') }}"></script>
@endsection

@section('content')
<div class="wrapper mt-20">

    <div class="clearfix pt-20">
        <div class="left">
            <h2>Manage Booking</h2>
        </div>
        <div class="right">
            <a class="button" href="{{ route('admin') }}"> Back</a>
        </div>
    </div>

    <form action="{{ route('booking-searchName')  }}" method="get">

        <div class="clearfix search-div">
            <input type="text" class="search left" name="name" autocomplete="off" required placeholder="Search by User">
            <button type="submit" class="button"><i class="fa fa-search"></i></button>
        </div>
    </form>
    <div class="overscroll">
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
        @foreach ($bookings as $book)
        <tr>
            <td>{{ $book->id }}</td>
            <td>{{ $book->name }}</td>
            <td>{{ $book->title }}</td>
            <td>{{ $book->seat_display_id }}</td>
            <td>{{ date('g:i A', strtotime($book->showtime))}}</td>
            <td>{{ $book->price}}</td>
            <td>
                <form method="PUT" action="{{ route('booking-delete',$book->id ) }}">
                    <button type="submit" class="button ml-10 button2 show_confirm">Cancel</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    </div>
    <div class="clearfix mt-20">
        <div class="right">
            <form method="PUT" action="{{ route('booking-deleteall') }}">
                <a class="button show_confirm" href="">Done for the Day</a>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('.show_confirm').click(function(event) {
        var form = $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        swal({
                title: `Are you sure you want to cancel this booking?`,
                text: "If you delete this, it will be gone forever.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    form.submit();
                }
            });
    });
</script>
@endsection
