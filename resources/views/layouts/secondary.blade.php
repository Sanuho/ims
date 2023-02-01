<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>IMS | {{ $title }}</title>

    <link rel="stylesheet" href="../css/datepicker.css" />
    <link rel="stylesheet" href="../css/style.css">
    {{-- @vite('resources/css/app.css') --}}
</head>
<body>

    <!-- // Start of Navbar -->
@include('partials.navbar')

{{-- <div class="container mt-4"> --}}

{{-- @include('partials.pageheader') --}}

@yield('container')

{{-- </div> --}}



{{-- @include('partials.footer') --}}
<script src="js/script.js"></script>
</body>
</html>





