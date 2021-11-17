@extends('layouts.app')

@section('style')

<link rel="stylesheet" type="text/css" href="{{ asset('css/reset.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/theater/style.css') }}">

@endsection

@section('script')
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
@endsection

@section('content')
<div class="wrapper mt-20">
    <div class="clearfix">
            <div class="left">
                <h2>Create Theater</h2>
            </div>
            <div class="right">
                <a class="button" href="{{ URL::previous() }}"> Back</a>
            </div>
    </div>
</div>
<div class="line"></div>
<div class="wrapper mt-20">
<form action="{{ route('theater.create') }}" method="POST">
    @csrf
            <div>
                <h3>Theater Infomations</h3>
                <input type="text" name="name" class="form-control" placeholder="Theater 1" autocomplete="off" required>
                <input type="text" name="address" class="form-control form-control2" placeholder="Yangon" autocomplete="off" required>
            </div>

            <div class="mt-20">
                <h3>Add Seat Rows</h3>
                <table id="dynamicTable">
                <tr>
                    <td><input type="text" name="addmore[0][roll]" placeholder="A" class="form-control" autocomplete="off" required/></td>
                    <td><input type="text" name="addmore[0][number]" placeholder="1" class="form-control" autocomplete="off" required /></td>
                    <td><input type="text" name="addmore[0][price]" placeholder="3000" class="form-control" autocomplete="off" required /></td>
                    <td><button type="button" name="add" id="add" class="button">Add More</button></td>
                </tr>
                </table>
            </div>

        <div class="mt-20">
                <button type="submit" class="button" >Submit</button>
        </div>

</form>
</div>
<script type="text/javascript">

    var i = 0;

    $("#add").click(function(){

        ++i;

        $("#dynamicTable").append('<tr><td><input type="text" name="addmore['+i+'][roll]" placeholder="A" class="form-control" autocomplete="off" required /></td><td><input type="text" name="addmore['+i+'][number]" placeholder="1" class="form-control" autocomplete="off" required /></td><td><input type="text" name="addmore['+i+'][price]" placeholder="3000" class="form-control" autocomplete="off" required /></td><td><button type="button" class="button button2 remove-tr">Remove</button></td></tr>');
    });

    $(document).on('click', '.remove-tr', function(){
         $(this).parents('tr').remove();
    });

</script>
@endsection
