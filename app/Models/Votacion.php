<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Votacion extends Model
{
    use HasFactory;

    public function candidato()
    {
        return $this->belongsTo(Candidato::class, 'candidato_id');
    }

    public function socio()
    {
        return $this->belongsTo(Socio::class, 'socio_id');
    }

    public function eleccion()
    {
        return $this->belongsTo(Eleccion::class, 'eleccion_id');
    }
}
