<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @yield('style')
    <link href="{{ asset('css/common.css') }}" rel="stylesheet" type="text/css">
    @yield('script')
    <!-- Script -->
    <script src="{{ asset('js/lib/jquery.min.js') }}"></script>
    <script src="{{ asset('js/common/nav.js') }}"></script>


    <title>Cinemax</title>
</head>
<body>

    @include('common.nav')
    @yield('content')

</body>

</html>
