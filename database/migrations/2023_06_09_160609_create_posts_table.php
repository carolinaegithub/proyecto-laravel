<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Método up para correr una nueva versión.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();

            #usamos un campo sin signos del tipo entero con user_id un nuevo campo
            $table->unsignedBigInteger('user_id');
            #user_id campo foraneo hace referencia al campo id dentro de users
            $table->foreign('user_id')->references('id')->on('users');
            #Añadimos campos a la tabla posts
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('body');
            
            $table->timestamps();
        });
    }

    /**
     * Método para volver a una versión antigua.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
