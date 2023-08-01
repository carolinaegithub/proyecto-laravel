@extends('template')

@section('content')
  <div class="bg-green-800 px-20 py-16 rounded-lg mb-8 relative overflow-hidden">
    <span class="text-xs uppercase text-green-900 bg-white rounded-full px-2 py-1">Programación</span>
    <h1 class="text-3xl text-white mt-4">Blog</h1>
    <p class="text-md text-white mt-2">Proyecto Desarrollo Web</p>
    <img src="{{ asset('images/dev.png') }}" class="absolute -right-20 -bottom-20 opacity-20">
  </div>

  <div class="px-4">
    <h1 class="text-2xl mb-8 text-gray-900">Publicaciones</h1>

    <div class="grid grid-cols-1 gap-4 mb-4">
        @foreach ($posts as $post)
            <a href="{{ route('post', $post->slug) }}" class="border border-green-600 rounded-lg px-6 py-4 hover:bg-green-50">
                <p class="text-sm flex items-center gap-2">
                    <span class="uppercese text-gray-700 bg-gray-200 rounded-full px-2 py-1">Tutorial</span>
                    <span>{{ $post->created_at->format('d/m/Y') }}</span>
                </p>
                <h2 class="text-lg text-gray-900 mt-2">{{ $post->title }}</h2>
                <div class="text-sm text-gray-900 opacity-75 flex items-center gap-1 my-3">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                  <path d="M4.5 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM14.25 8.625a3.375 3.375 0 116.75 0 3.375 3.375 0 01-6.75 0zM1.5 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM17.25 19.128l-.001.144a2.25 2.25 0 01-.233.96 10.088 10.088 0 005.06-1.01.75.75 0 00.42-.643 4.875 4.875 0 00-6.957-4.611 8.586 8.586 0 011.71 5.157v.003z" />
                </svg>
                  {{ $post->user->name }}
                </div>
            </a>
        @endforeach
    </div>

    {{ $posts->links() }}

  </div>
@endsection