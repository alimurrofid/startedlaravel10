<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    {{-- <link rel="stylesheet" href="{{ 'css/app.css' }}"> --}}
    <title>Halaman Laravel</title>
</head>
<body>
    <div class="container py-5">
        @if (Auth::check())
             @include('komponen/menu')
        @endif
        @include('komponen/pesan')
        @yield('konten')
    </div>
</body>
</html>