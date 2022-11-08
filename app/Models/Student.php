<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';
    protected $fillable = [
        'year',
        'user_id',
        'preinscription_completed'
    ];
    protected $guarded = [
        'id'
    ];

    public function careers()
    {
        return $this->belongsToMany(Career::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault([
            'id' => null
        ]);
    }

    public function turns()
    {
        return $this->hasMany(Turn::class, 'student_id', 'id');
    }
}
