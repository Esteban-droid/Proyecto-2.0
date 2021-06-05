<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    protected $fillable = [
        'titulo', 'descripcion', 'paginas','link', 'user_id', 'editorial_id'
    ];

    // USUARIO CREADOR LIBRO
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // AUTORES DEL LIBRO
    public function autores()
    {
        return $this->belongsToMany(Autor::class)->withTimestamps(); //belongsToMany -> Muchos es a muchos...tabla intermedia (autores_libros)
    }

    // EDITORIAL DEL LIBRO
    public function editorial()
    {
        return $this->belongsTo(Editorial::class);
    }
}