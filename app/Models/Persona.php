<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;

    protected $table = 'personas';
    protected $fillable = [
        'nombres',
        'apellidos',
        'email',
        'nacionalidad',
        'celular',
        'calle',
        'numero',
        'piso',
        'dpto',
        'codpostal'
    ];
    protected $guarded = [
        'id_personas',
        'docpersonas',
        'localidades_id'
    ];

    public function localidad()
    {
        return $this->belongsTo(Localidad::class);
    }

    public function estudiante()
    {
        return $this->hasOne(Estudiante::class);
    }
}