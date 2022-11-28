<?php

namespace App\Models;

use Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kirschbaum\PowerJoins\PowerJoins;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Student extends Model
{
    use SoftDeletes;
    use PowerJoins;
    use HasFactory;

    protected $table = 'students';
    protected $appends = ['position'];
    protected $fillable = [
        'year',
        'user_id',
        'completePreinscription',
        'created_at'
    ];
    protected $guarded = [
        'id'
    ];

    public function careers()
    {
        return $this->belongsToMany(Career::class)->withTimestamps();
    }

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault([
            'id' => null
        ]);
    }

    public function turns()
    {
        return $this->hasMany(Turn::class);
    }

    public function getPositionAttribute()
    {
        if ($this->career_id) {
            return DB::table('students')
                ->select(
                    DB::raw(
                        'COUNT(*) +1 as count'
                    )
                )->from(
                    Student::leftJoinRelationship('careers')
                        ->select('career_student.career_id', 'career_student.student_id')
                        ->where('career_student.career_id', $this->career_id)
                        ->where('career_student.onOld', 1)
                        ->where(
                            'career_student.created_at',
                            '<',
                            $this->created_at
                        )
                )->first()->count;
        } else {
            return '';
        }
    }
}
