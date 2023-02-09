<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lugares extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'descripcion',
        'imagen',
        'ubicacion'
    ];

    public function eventos(){
        return $this->belongsToMany(eventos::class,'lugares_eventos');
    }
}
