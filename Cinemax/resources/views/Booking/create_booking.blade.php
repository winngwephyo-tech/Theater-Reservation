<!DOCTYPE html>
<html>
<head>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>
<style>
    .red{
        color:red;
    }
    .green{
        color:green;
    }
</style>
<body>
<table>
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
            <tr> <span class="red"> {{ $seat->display_id }} </span> </tr>
            @break
        @endif

    @endforeach

    @endif

         @if ($seat->display_id !== $value)
            <tr> <span class="green"> {{ $seat->display_id }} </span> </tr>
        @endif
    @php
    $old_roll = $seat->roll;
    @endphp
@endforeach
</table>
<form action="{{ route('booking.create', ['movie_id' => $movie_id, 'showtime_id' => $showtime_id]) }}" method="POST">
    @csrf

     <div>
        <div>
            <div>
                <table class="table table-bordered" id="dynamicTable">
                <tr>
                    <td><input type="text" name="addmore[0][roll]" placeholder="A" class="form-control" required/></td>
                    <td><input type="text" name="addmore[0][number]" placeholder="1" class="form-control" required /></td>
                    <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
                </tr>
                </table>
            </div><br>
        </div>
        <div>
                <button type="submit">Submit</button>
        </div>
    </div>

</form>
<script type="text/javascript">

    var i = 0;

    $("#add").click(function(){

        ++i;

        $("#dynamicTable").append('<tr><td><input type="text" name="addmore['+i+'][roll]" placeholder="A" class="form-control" required /></td><td><input type="text" name="addmore['+i+'][number]" placeholder="1" class="form-control" required /></td><td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>');
    });

    $(document).on('click', '.remove-tr', function(){
         $(this).parents('tr').remove();
    });

</script>
</body>
</html>
