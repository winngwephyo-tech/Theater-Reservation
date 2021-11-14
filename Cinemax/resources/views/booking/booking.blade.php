@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Booking</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/booking/reset.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/booking/common.css') }}">
    <link href="{{ asset('css/booking/style.css') }}" rel="stylesheet"  type="text/css">
</head>

<body>
    <div class="container">
        <div class="header clearfix">
            <div class="logo">Logo</div>
            <div class="account">UserName</div>
        </div>
        <div class="content clearfix">
            <div class="content-left">
                @foreach ($booking as $book)
                <p> You booked 2 seats for the Movie:<span>{{$book->title}} </span> </p>
                <p> Seat Number :<span>{{$book->display_id}}</span></p>
                <p>Total Fee :<span>4000MMK</span></p>
                <a href="#" class="btn-link">Home</a>
            </div>
            <div class="content-right">
                <img src="/image/{{ $book->poster }}" alt="Army of Thieves" class="img-poster">
                <p>{{$book->title}} </p>
                <span>{{$book->duration}} min</span>
                @endforeach
            </div>
        
        </div>
    </div>
</body>

</html>