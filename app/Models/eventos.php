<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class eventos extends Model
{
    use HasFactory;
    protected $fillable = [
        "nombre",
        "descripcion",
        "imagen",
        "fechaInicio",
        "fechaFin",
        "departamento_id",
        "ciudad_id",
    ];

    public function lugares(){
        return $this->belongsToMany(lugares::class,'lugares_eventos');
    }

    public function scopeAntiguo($query)
    {
        return $query->where('fechainicio','<',now()->format('Y-m-d'))->where('fechaFin','<',now()->format('Y-m-d'))->paginate(1);
    }

    public function scopeFecha($query)
    {
        return $query->where('fechaInicio', '>' , now()->format('Y-m-d'))->paginate(1);
    }
    public function scopeOcurriendo($query)
    {
        return $query->where('fechaInicio', '<=' , now()->format('Y-m-d'))->where('fechaFin','>=',now()->format('Y-m-d'))->paginate(1);

    }
}
