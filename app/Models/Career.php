<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kirschbaum\PowerJoins\PowerJoins;

class Career extends Model
{
    use HasFactory;
    use SoftDeletes;
    use PowerJoins;

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
