<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_torneo extends Model
{
    use HasFactory;

    protected $fillable = [
        'aceptada',
        'user_id',
        'torneo_id',
    ];

    protected $table = 'user_torneo';
    // relacion uno a muchos 
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function torneo()
    {
        return $this->belongsTo(Torneo::class);
    }

    // relacion uno a muchos 
    public function resultado()
    {
        return $this->hasMany(Resultado::class);
    }
}
