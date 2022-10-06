<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    use HasFactory;

    protected $fillable = [
        'grupo',
        'continente',
        'nombre_pais',
    ];

    protected $table = 'paises';
    // relacion uno a muchos 
    public function torneo()
    {
        return $this->belongsToMany(Torneo::class, 'torneo_pais');
    }

    // relacion uno a muchos 
    public function partidos()
    {
        return $this->hasMany(Partido::class);
    }

    // relacion uno a muchos 
}
