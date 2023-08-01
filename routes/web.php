<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/**
 * Route::get     = Consultar
 * Route::post    = Alterar a DataBase
 * Route::delete  = Eliminar
 * Route::put     = Actualizar
 */

Route::controller(PageController::class)->group(function () {     
    /* Nos lleva a la vista home.blade.php */
    Route::get('/',           'home')->name('home');
    #Slug siendo una propiedad del post     
    Route::get('blog/{post:slug}', 'post')->name('post'); 

});

Route::redirect('dashboard', 'posts')->name('dashboard');

Route::resource('posts', PostController::class)->middleware(['auth'])->except(['show']);
#La config de inicio de sesion esta en esta ruta
require __DIR__.'/auth.php';
