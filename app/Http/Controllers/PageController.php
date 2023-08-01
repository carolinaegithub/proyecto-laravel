<?php

namespace App\Http\Controllers;

use App\Models\Post;         #Clases propias
use Illuminate\Http\Request; #Illuminate Clases de Laravel

class PageController extends Controller
{   # La función recibe un objeto $request de tipo Request como parámetro.
    public function home(Request $request){
        /** 
         * Se accede al valor del parámetro search enviado en la solicitud HTTP utilizando $request->search. 
         * Esto permite obtener el valor del campo de búsqueda ingresado por el usuario en el formulario de búsqueda
         * La condición LIKE con %{$search}% se utiliza para buscar coincidencias parciales.
         */
        $search = $request->search;
        # Se realiza una consulta a la base de datos utilizando el modelo Post. 
        $posts = Post::where('title', 'LIKE', "%{$search}%")->with('user')->latest()->paginate();
        return view('home', ['posts' => $posts]);
    }

    // Consulta a base de datos
    // $posts = Post::get(); permite obtener los registros
    // $post = Post::first(); permite obtener el primer registro
    // $post = Post::find(25); busca el registro con id 25
    #dd($post);

    #Obtengo cada publicación individual
    public function post(Post $post){
        #La paso a las vistas
        /* Eloquent nos ayuda a trabajar con los datos como si fueran objetos 
        Además permite realizar consultas sin código sql*/

        return view('post', ['post' => $post]);
    }
}
