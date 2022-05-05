<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Devstagram - @yield('titulo')</title>
    @stack('styles')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
    @livewireStyles
</head>

<body class='bg-gray-100'>
    <header class="p-5 border-b bg-white shadow">
        <div class="container mx-auto flex justify-between items-center">
            <a href="{{ route('home') }}" class="text-3xl font-black text-gray-700">TECHGRAM</a>
            @auth
                <nav class='flex gap-3 items-center'>
                    <a href="{{ route('posts.create') }}"
                        class="flex items-center gap-2 bg-white border p-2 text-gray-600 rounded text-sm uppercase font-bold cursor-pointer hover:text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                          </svg>
                        Crear Post</a>
                    <a class='font-bold uppercase text-gray-600 hover:cursor-pointer hover:text-gray-500' href="{{ route('posts.index', auth()->user()->username) }}">Hola
                        <span class="font-bold text-rose-500">@</span><span
                            class="font-normal uppercase">{{ auth()->user()->username }}</span></a> |
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type='submit'
                            class='font-bold uppercase text-gray-600 hover:cursor-pointer hover:text-gray-500'>Salir</button>
                    </form>
                </nav>
            @endauth
            @guest
                <nav class='flex gap-3 items-center'>
                    <a class='font-bold uppercase text-gray-600 hover:cursor-pointer hover:text-gray-500' href="{{ route('login') }}">Inicia
                        sesión</a> |
                    <a class='font-bold uppercase text-gray-600 hover:cursor-pointer hover:text-gray-500'
                        href="{{ route('register') }}">Crear cuenta</a>
                </nav>
            @endguest
        </div>
    </header>
    <main class='container mx-auto mt-10 px-10'>
        <h2 class='text-3xl uppercase font-black text-center mb-10 text-gray-600'>@yield('titulo')</h2>
        @yield('contenido')
    </main>
    <footer class='text-center p-5 mt-10 text-gray-500 font-bold uppercase'>
        DevStagram &copy;{{ now()->year }} - Todos los derechos reservados
    </footer>
    @livewireScripts
</body>

</html>
