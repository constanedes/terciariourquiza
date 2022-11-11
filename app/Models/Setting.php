<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Setting extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $table = 'settings';
    protected $fillable = [
        'name',
        'value',
        'obs'
    ];
    protected $guarded = [
        'id'
    ];
}
