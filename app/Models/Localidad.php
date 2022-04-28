<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Localidad extends Model
{
    use HasFactory;

    protected $table = 'localidades';
    protected $fillable = ['codlocalidad','localidad'];
    protected $guarded = ['id_localidades'];

    public function personas()
    {
        return $this->hasMany(Persona::class);
    }
}
