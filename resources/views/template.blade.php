<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto web</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container px-4 mx-auto">
      <header class="flex justify-between items-center py-4">
        <div class="flex items-center flex-grow gap-2">
            <a href="{{ route('home') }}">
                <img src="{{ asset('images/logo1.jpg') }}" class="cursor-pointer h-20">
            </a>
            <form action="{{ route('home') }}" method="GET" class="flex-grow">
              <!-- Con value le pedimos que recupere lo que se ha enviado por la url (método GET) -->
                <input type="text" name="search" placeholder="Buscar" value="{{ request('search') }}" class="border border-gray-200 rounded py-2 px-4 w-1/2">
            </form>
        </div>
        @auth <!-- Si estás logeado ingresa a dashboard -->
        <a href="{{ route('dashboard') }}" class="bg-green-700 px-5 py-3 rounded-md text-white hover:bg-green-600 duration-500">DASHBOARD</a>    
        @else
        <a href="{{ route('dashboard') }}" class="bg-green-600 rounded-md py-3 px-5 hover:bg-green-700 duration-500 text-white">LOGIN</a>   
        @endauth
      </header>
      
      <div class="opacity-60 h-px mb-8" style="
      background: linear-gradient(to right,
      rgba(200, 200, 200, 0) 0%,
      rgba(20, 121, 2, 0.758) 30%,
      rgba(20, 121, 2, 0.758) 70%,
      rgba(200, 200, 200, 0) 100%
      );">

      </div>

      @yield('content')

      <p class="py-16">
        <img src="{{ asset('images/logo.jpg') }}" class="h-12 mx-auto">
      </p>
    </div>
</body>
</html>