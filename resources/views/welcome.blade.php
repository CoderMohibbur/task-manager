<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
</head>
<body>

    <nav class="navbar sticky-top bg-body-tertiary">
            @if (Route::has('login'))
                <div class="container-fluid">
                    @auth
                    <a class="navbar-brand text-end" href="{{ url('/dashboard') }}">Dashboard</a>
                    @else
                    <a class="navbar-brand text-end" href="{{ route('login') }}">Login</a>
                        @if (Route::has('register'))
                        <a class="navbar-brand text-end" href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
    </nav>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>