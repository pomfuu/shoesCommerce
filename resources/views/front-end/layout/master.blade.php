<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Onest:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> --}}
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"> --}}
    <link rel="icon" type="image/svg+xml" href="{{ url('./storage/asset/schuhe_background_stroke.svg') }}" />
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <title> @yield('title') </title>
    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}

    @vite(['resources/js/app.js'])
    <style>
        body{
            font-family: 'Onest', sans-serif;
            background-color: #FFFFFC;
        }

        :root{
            --input-border: #b8b8b8;
        }

        ::-webkit-scrollbar {
            width: 6px;
            background-color: #FFFFFC;
        }

        ::-webkit-scrollbar-thumb {
            background-color: #1e1e1e;
            border-radius: 5px;
        }

        .nav-link{
            color: #1e1e1e;
            transition: 0.3s ease-in-out;
            -webkit-transition: 0.3s ease-in-out;
            -moz-transition: 0.3s ease-in-out;
            -ms-transition: 0.3s ease-in-out;
            -o-transition: 0.3s ease-in-out;
        }

        .nav-link:hover{
            color: #E19827;
        }

        .nav-link:active{
            color: #1e1e1e;
        }
    </style>
</head>
<body style="font-family:'Onest', sans-serif; ">
    @include('front-end.layout.navbar')
    @yield('content')
    @include('front-end.layout.footer')
</body>
</html>
