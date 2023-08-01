@csrf <!-- Lo colocamos siempre por seguridad 
y para que laravel sepa que nuestros formulario son generados 
por él mismo -->

<label class="uppercase text-green-900 text-xs">Título</label>

<!-- Si existe un error respecto al titulo, imprimelo -->
<span class="text-red-600 text-sm ml-4">@error('title') {{ $message }} @enderror</span>
<!-- Recuperar el título antiguo con old -->
<input type="text" name="title" class="rounded border-gray-200 w-full mb-4"  value="{{ old('title', $post->title) }}">

<label class="uppercase text-green-900 text-xs">Slug</label>
<span class="text-red-600 text-sm ml-4">@error('slug') {{ $message }} @enderror</span>
<input type="text" name="slug" class="rounded border-gray-200 w-full mb-4"  value="{{ old('slug', $post->slug) }}">


<label class="uppercase text-green-900 text-xs">Contenido</label>
<span class="text-red-600 text-sm ml-4">@error('body') {{ $message }} @enderror</span>
<textarea name="body" class="rounded border-gray-200 w-full mb-4" rows="5">{{ old('body', $post->body) }}</textarea> 

<div class="flex justify-between items-center">
    <!-- Nos permite volver a la vista anterior index -->
    <a href="{{ route('posts.index') }}" class="text-green-700 cursor-pointer hover:text-green-900 duration-500">Volver</a>
    <input type="submit" value="Enviar" class="cursor-pointer text-sm bg-green-800 text-white rounded px-6 py-2 hover:bg-green-600 duration-500">
</div>
