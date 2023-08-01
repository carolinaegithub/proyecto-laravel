<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight flex items-center justify-between">
            {{ __('Posts') }}
            <a href="{{ route('posts.create') }}" class="text-sm bg-green-800 text-white rounded px-6 py-4 hover:bg-green-600 duration-500">Crear</a>
		</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-green-700 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                	
                	<table class="mb-4">
                        @foreach($posts as $post)
                        <tr class="border-b border-gray-200 text-sm">
                            <!-- Esta celda va a tener el título del post -->
                            <td class="px-6 py-4">{{ $post->title }}</td>
                            <td class="px-6 py-4">
                                <a href="{{ route('posts.edit', $post) }}" class="text-green-700 cursor-pointer hover:text-green-900 duration-500">Editar</a>
                            </td>

                            <td class="px-6 py-4">
                            	<form action="{{ route('posts.destroy', $post) }}" method="POST">
                                    @csrf <!-- Genera un token de seguridad, laravel lo identifica como un formulario propio -->
								    @method('DELETE') <!-- Indica que la solicitud debe ser tratada como eliminación -->
								    <input 
								    	type="submit" 
								    	value="Eliminar" 
								    	class=" bg-green-800 text-white rounded px-4 py-2 cursor-pointer hover:bg-green-600 duration-500" 
                                          
                                        onclick="return confirm('¿Segura que lo eliminas? ')"
								    > <!-- Retornamos un mensaje de confirmación
                                        Al hacer click en eliminar se muestra una ventana emergente para confirmación -->
								</form>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>