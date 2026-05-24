<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="icon" href="{{ asset('images/logo.png') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">    
</head>
<body>
    @include('layout.navbar')
    
    @include('layout.alert')

    <div class="container">
        @yield('content')
    </div>
    
    @include('layout.footer')
    <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
    <script>
        setTimeout(() => {
            document.querySelectorAll('.alert').forEach(el => {
                bootstrap.Alert.getOrCreateInstance(el).close();
            });
        }, 5000);
    </script>
</body>
</html>