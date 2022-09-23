<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    </head>
    <body>
        <div class="container">
            <header>
                <nav>
                    @auth
                    <span>{{ auth()->user()->name }}</span> | 
                    <a href="/students">Home</a> | 
                    <a href="/logout">Logout</a>
                    @endauth
                    @guest
                    <a href="/register">Register</a> | 
                    <a href="/login">Login</a> | 
                    @endguest
                </nav>
            </header>
            <main class="mt-3 mb-3">
                @yield('content')
            </main>
            <footer>
                Powered By Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
            </footer>
        </div>
    </body>
</html>
