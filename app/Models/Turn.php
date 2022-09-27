<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turn extends Model
{
    use HasFactory;

    protected $table = 'turns';
    protected $fillable = [
        'date',
        'time'
    ];
    protected $guarded = [
        'id',
        'student_id',
    ];

    public function user()
    {
        return $this->belongsTo(Student::class);
    }
}
