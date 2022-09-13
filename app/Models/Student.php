<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';
    protected $fillable = [
        'year'
    ];
    protected $guarded = [
        'id',
        'users_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}