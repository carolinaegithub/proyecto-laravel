@extends('template')

@section('content')
<h1>Listado</h1>
    @foreach ($posts as $post)
    <p>
        <!-- Trabajamos con el formato de objeto propiedad gracias a Eloquent -->
        <strong>{{ $post->id }}</strong>
        <a href="{{route('post', $post->slug) }}">
            <!-- Una propiedad del 'objeto' post -->
            {{ $post->title }}
        </a>
        <br>
        
        <span>{{ $post->user->name }}</span>
    </p>
    @endforeach
    <!-- Permite mostrar la paginación -->
    {{ $posts->links() }}

@endsection
 