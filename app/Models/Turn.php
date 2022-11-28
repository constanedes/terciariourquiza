<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kirschbaum\PowerJoins\PowerJoins;
use Illuminate\Database\Eloquent\SoftDeletes;

class Turn extends Model
{
    use SoftDeletes;
    use PowerJoins;
    use HasFactory;

    protected $table = 'turns';
    protected $fillable = [
        'date',
        'time',
        'student_id',
        'created_at'
    ];
    protected $appends = [
        'careers_concat'
    ];
    protected $guarded = [
        'id'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class)->withDefault([
            'id' => null,
            'user' => [
                'id' => null,
                'name' => null,
                'surname' => null,
            ]


        ]);
    }

    public function getCareersConcatAttribute()
    {
        if ($this->student_id) {
            return implode(', ', Student::leftJoinRelationship('careers')
                ->select('careers.career')
                ->where('career_student.student_id', $this->student_id)
                ->where('career_student.onOld', 0)
                ->pluck('career')
                ->toArray());
        }
    }
}
