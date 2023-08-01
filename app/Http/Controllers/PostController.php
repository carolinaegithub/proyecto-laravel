<?php
namespace App\Http\Controllers;

use App\Models\Post;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index() {
    	return view('posts.index', 
        #Consulta: trabajamos con las publicaciones de la tabla ordenadas de manera decendente y método de paginación
        [
            'posts' => Post::latest()->paginate()
        ]);
    }

    public function create(Post $post) {
        return view('posts.create', compact('post'));
    }
    
    #trabajamos con Request porque es la clase con la info que nos envía el usuario a traves del form
    public function store(Request $request) {
        #Validamos datos
        $request->validate([
            'title' => 'required',
            #Que sea único en la tabla posts, especificamente el campo slug
            'slug'  => 'required|unique:posts,slug' ,
            'body'  => 'required',
        ]);
        #Desarrollamos una nueva publicación con el usuario logeado, eso lo tenemos dentro de $request
        $post = $request->user()->posts()->create([
            #La información la obtengo de lo que el usuario ha enviado
            'title' => $request->title,
            'slug'  => $request->slug,
            'body'  => $request->body,
        ]);
        
        return redirect()->route('posts.index', $post);
    }

    public function edit(Post $post) {
        return view('posts.edit', compact('post'));
    }

    #Recuperamos al registro que queremos editar de edit (Post $post)
    public function update(Request $request, Post $post) {
        $request->validate([
            'title' => 'required',
            #Revisa la validación pero la ignora al mismo tiempo el registro con el que se está trabajando en ese momento
            'slug'  => 'required|unique:posts,slug,' . $post->id,
            'body'  => 'required',
        ]);

        $post->update([
            'title' => $request->title,
            'slug'  => $request->slug,
            'body'  => $request->body,
        ]);

        return redirect()->route('posts.index', $post);
    }

    #Ruta y parámetro que se está esperando
    public function destroy(Post $post) {   #Que el post seleccionado sea eliminado
        $post->delete();
        #Retornamos a la vista anterior
        return back();
    }
}