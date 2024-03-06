<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidato extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'update_at'];

    public function eleccion()
    {
        return $this->belongsTo(Eleccion::class);
    }

    public function socio()
    {
        return $this->belongsTo(Socio::class);
    }
}
