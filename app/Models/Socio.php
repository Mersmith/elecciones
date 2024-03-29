<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Socio extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'update_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function candidaturas()
    {
        return $this->hasMany(Candidato::class);
    }

    public function imagenPerfil()
    {
        return $this->morphOne(ImagenPerfil::class, "imagen_perfilable");
    }
}
