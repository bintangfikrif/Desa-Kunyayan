<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'My Application')</title>
    @vite(['resources/css/styles.css'])
    <style>
        .active {
            font-weight: bold;
        }
        nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        nav ul li {
            display: inline;
            margin-right: 10px;
        }
        .right {
            float: right;
        }
    </style>
</head>
<body>
    <nav>
        <ul>
            <li>
                <a href="{{ route('home') }}" class="{{ Request::is('/') || Request::is('home') ? 'active' : '' }}">Home</a>
            </li>
            <li>
                <a href="{{ route('profil') }}" class="{{ Request::is('profil') ? 'active' : '' }}">Profil Pekon</a>
            </li>
            <li>
                <a href="{{ route('infografis') }}" class="{{ Request::is('infografis') ? 'active' : '' }}">Infografis</a>
            </li>
            <li>
                <a href="{{ route('mitigasi') }}" class="{{ Request::is('mitigasi') ? 'active' : '' }}">Mitigasi Bencana</a>
            </li>
            @auth
                @if(auth()->user()->hasRole('admin'))
                    <li>
                        <a href="{{ route('admin.home') }}" class="{{ Request::is('admin/home') ? 'active' : '' }}">Dashboard</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.stats.edit') }}" class="{{ Request::is('admin/stats/edit') ? 'active' : '' }}">Edit Stats</a>
                    </li>
                @endif
            @endauth
        </ul>
        <span class="right">
            @auth
                <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                    @csrf
                    <button type="submit" style="background: none; border: none; cursor: pointer; color: blue; text-decoration: underline;">
                        Logout
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}">Log in</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </span>
    </nav>
    <main>
        @yield('content')
    </main>
</body>
</html>
