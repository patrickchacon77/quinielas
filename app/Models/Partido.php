<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partido extends Model
{
    use HasFactory;

    protected $fillable = [
        'completado',
        'goles_equipo1',
        'goles_equipo2',
        'resultado',
        'fecha_partido',
        'pais1_id',
        'pais2_id',
        'torneo_id',
        'titulo'
    ];

    protected $table = 'partidos';
    // relacion uno a uno 
    public function pais1()
    {
        return $this->hasOne(Pais::class,  'id', 'pais1_id');
    }

    // relacion uno a uno 
    public function pais2()
    {
        return $this->hasOne(Pais::class,  'id', 'pais2_id');
    }

    // relacion uno a muchos 
    public function torneo()
    {
        return $this->belongsTo(Torneo::class);
    }

    // relacion uno a muchos 
}
