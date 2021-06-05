<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    protected $fillable = [
        'nombre'
    ];


    // LIBROS DEL AUTOR
    public function libros()
    {
        return $this->belongsToMany(Libro::class);
    }
}