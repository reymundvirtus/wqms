<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/app.css">
        <title>Posty</title>
    </head>
    <body class="bg-indigo-500">
        <nav class="p-6 bg-indigo-500 flex justify-between mb-6 fixed w-full">
            <ul class="flex items-center">
                {{-- <li>
                    <a class="p-3" href="{{ route('home') }}">Home</a>
                </li> --}}
                <li>
                    {{-- <a class="p-3" href="{{ route('dashboard') }}">Dashboard</a> --}}
                </li>
                <li>
                    {{-- <a class="p-3" href="{{ route('posts') }}">Post</a> --}}
                </li>
            </ul>

            <ul class="flex items-center">
                @auth
                    <li>
                        <a class="p-3" href="#">{{ auth()->user()->name }}</a>
                    </li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST" class="p-3 inline">
                            @csrf
                            <button type="submit">Logout</button>
                        </form>
                    </li>                    
                @endauth

                @guest
                    {{-- <li>
                        <a class="p-3" href="{{ route('login') }}">Login</a>
                    </li> --}}
                    <li>
                        {{-- <a class="p-3" href="{{ route('register') }}">Register</a> --}}
                    </li>  
                @endguest
            </ul>
        </nav>
        @yield('content')
    </body>
</html>