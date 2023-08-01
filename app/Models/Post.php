<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Post extends Model
{
    use HasFactory;

    #Nos traemos la info del modelo User, pero con la info de la publicación
    protected $fillable = [
    	'title', 
    	'slug', 
    	'body'
    ];

    public function user()
    { #Un publicación pertenece a un usuario
    	return $this->belongsTo(User::class);
    }
}
