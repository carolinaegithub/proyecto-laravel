<?php

namespace Database\Factories;

#Importamos esta clase que permite convertir el texto a una url amigable
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            #Añadimos 1 porque tenemos un solo user, todos los post pertenecen al mismo user :o
            'user_id'=> 1,
            'title' => $title = $this->faker->sentence(),
            #Llamamos a la clase con su método y va a convertir al titulo
            'slug'  => Str::slug($title),
            'body'  => $this->faker->text(200),
        ];
    }
}
