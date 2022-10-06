<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Torneo extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre_torneo',
        'sede_torneo',
        'tipo',
    ];

    protected $table = 'torneos';
    // relacion uno a muchos 
    public function paises()
    {
        return $this->belongsToMany(Pais::class, 'torneo_pais', 'torneo_id', 'pais_id');
    }

    // relacion uno a muchos 
    public function partidos()
    {
        return $this->hasMany(Partido::class);
    }

    // relacion uno a muchos 
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // relacion uno a muchos 
    public function user_torneo()
    {
        return $this->hasMany(User_torneo::class);
    }
}
