<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Pasamos como parámetro el post que queremos editar -->
                    <form action="{{ route('posts.update', $post) }}" method="POST">
                    	@method('PUT') <!-- La intención es editar -->
                    	@include('posts._form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>