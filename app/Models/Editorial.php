<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Editorial extends Model
{
    protected $fillable = [
        'nombre'
    ];

    protected $hidden = [ //para ocultar esos campos
        'created_at', 'updated_at'
    ];


    // LIBROS DE LA EDITORIAL
    public function libros()
    {
        return $this->hasMany(Libro::class);
    }
}