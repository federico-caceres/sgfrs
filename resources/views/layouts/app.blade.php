<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>SGFRS</title>
    <!-- Scripts -->
    <!--<script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('https://code.jquery.com/jquery-3.3.1.min.js') }}" defer></script>-->
    <!-- Fonts -->
   <!-- <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <!-- Styles -->

      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

      <!--<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">-->

</head>
<body>
<main class="py-4">

@yield('content')
</main>
</body>
</html>
