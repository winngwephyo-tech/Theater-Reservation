<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Styles -->
<link href="{{ asset('css/movie/reset.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('css/movie/style.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('css/movie/common.css') }}" rel="stylesheet" type="text/css">

  @yield('style')

  @yield('script')
  
<title>Cinemax</title>
</head>
<body>
    @yield('content')

</body>

</html>