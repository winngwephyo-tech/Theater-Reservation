@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="heading">Now Showing</h1>
    <div class="show-list">
       <?php $count= $theater; ?>
        @for($i=1 ; $i<=$count ; $i++)
            <div class="img">
                <a href=""><img src="" alt=""></a>
                <p>{{ $result->title }}<br> {{ $result->duration }}</p>
            </div>
        @endfor
    </div>
</div>
<div class="upcoming-list">
    <div class="ttl">
        <h1 class="heading">Upcoming Movies</h1>
    </div>
    <div class="container">
        <div class="show-list">
            @for ($j=1 ; $j<5 ;$j++)
            <div class="img">
                <img src="" alt="">
                <p>movie name <br> duration</p>
            </div>
            @endfor
        </div>
    </div>
</div>

@endsection
