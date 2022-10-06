<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resultado extends Model
{
    use HasFactory;

    protected $fillable = [
        'goles_equipo1',
        'goles_equipo2',
        'puntos_apostados',
        'user_torneo_id',
        'partido_id',
        'resultado'
    ];

    protected $table = 'resultados';
    // relacion uno a uno 

    public function user_torneo()
    {
        return $this->belongsTo(User_torneo::class, 'user_torneo_id');
    }

    public function partidos()
    {
        return $this->belongsTo(Partido::class, 'partido_id');
    }

    // relacion uno a muchos 
    public function resultado()
    {
        return $this->hasMany(Resultado::class);
    }
    
}
