<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, HasRoles, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'typedoc',
        'name',
        'surname',
        'email',
        'password',
        'nationality',
        'phone',
        'address',
        'postalcode',
        'locality',
        'birthday',
        'title',
        'yearofgraduation',
        'institution'
    ];

    protected $guarded = [
        'id',
        'numdoc',
        'localidad_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function localidad()
    {
        return $this->belongsTo(Localidad::class);
    }

    public function estudiante()
    {
        return $this->hasOne(Estudiante::class);
    }
}
