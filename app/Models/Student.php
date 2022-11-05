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
        'user_id'
    ];
    protected $guarded = [
        'id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function careers()
    {
        return $this->belongsToMany(Career::class);
    }

    public function turns()
    {
        return $this->hasMany(Turn::class);
    }
}
