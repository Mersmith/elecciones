<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eleccion extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'fecha_inicio', 'fecha_fin'];

    public function candidatos()
    {
        return $this->hasMany(Candidato::class);
    }
}
