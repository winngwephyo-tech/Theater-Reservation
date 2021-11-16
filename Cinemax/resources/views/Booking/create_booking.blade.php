@extends('layouts.app')

@section('style')

<link rel="stylesheet" type="text/css" href="{{ asset('css/reset.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/booking/style.css') }}">

@endsection

@section('script')
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
@endsection


@section('content')
<div class="wrapper mt-20">
    <div class="clearfix">
            <div class="left">
                <h2>{{ $theater_name }}</h2>
            </div>
            <div class="right">
                <a class="button" href="{{ URL::previous() }}"> Back</a>
            </div>
    </div>
    <div class="seats">
    <div class="screen">Screen</div>
        @php
        $old_roll = 'A';
        @endphp
    @foreach ($seats as $seat)

        @if( $old_roll !== $seat->roll)
        <br>
        @endif

        @if (!(empty($booked))) 

        @foreach($booked as $key => $value)

            @if ($seat->display_id == $value)
            <span class="booked buzz-out-on-hover"> <strong>{{ $seat->display_id }}</strong> <br> <small>{{ $seat->price }} Ks</small> </span> 
                @break
            @endif

        @endforeach

        @endif

            @if ($seat->display_id !== $value)
            <span class="not-booked buzz-out-on-hover"> <strong>{{ $seat->display_id }}</strong> <br> <small>{{ $seat->price }} Ks</small> </span> 
            @endif
        @php
        $old_roll = $seat->roll;
        @endphp
    @endforeach
    </div>
</div>
<div class="line">
@if ($message = Session::get('error'))
        <div class="alert">
            <p>{{ $message }}</p>
        </div>
@endif
</div>
<div class="wrapper">
    <div class="inputs">
        <h3>Choose Your Seats</h3>
        <form action="{{ route('booking.create', ['movie_id' => $movie_id, 'showtime_id' => $showtime_id]) }}" method="POST">
            @csrf

            <div>
                <div>
                    <div>
                        <table id="dynamicTable">
                        <tr>
                            <td><input type="text" name="addmore[0][roll]" placeholder="A" class="form-control" autocomplete="off" required/></td>
                            <td><input type="text" name="addmore[0][number]" placeholder="1" class="form-control" autocomplete="off" required /></td>
                            <td><button type="button" name="add" id="add" class="button">Add More</button></td>
                        </tr>
                        </table>
                    </div><br>
                </div>
                <div>
                        <button type="submit" class="button">Confirm</button>
                </div>
            </div>

        </form>
        </div>
</div>
<script type="text/javascript">

    var i = 0;

    $("#add").click(function(){

        ++i;

        $("#dynamicTable").append('<tr><td><input type="text" name="addmore['+i+'][roll]" placeholder="A" class="form-control" autocomplete="off" required /></td><td><input type="text" name="addmore['+i+'][number]" placeholder="1" class="form-control" autocomplete="off" required /></td><td><button type="button" class="button button2 remove-tr">Remove</button></td></tr>');
    });

    $(document).on('click', '.remove-tr', function(){
         $(this).parents('tr').remove();
    });

</script>
@endsection
