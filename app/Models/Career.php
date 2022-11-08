<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    use HasFactory;

    protected $table = 'careers';
    protected $fillable = [
        'career',
        'desc',
        'desc_corta',
        'image'
    ];
    protected $guarded = [
        'id'
    ];

    public function users()
    {
        return $this->belongsToMany(Student::class);
    }
}
