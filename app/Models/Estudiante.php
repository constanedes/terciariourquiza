<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;

    protected $table = 'estudiantes';
    protected $fillable = [
        'anio'
    ];
    protected $guarded = [
        'id',
        'persona_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}