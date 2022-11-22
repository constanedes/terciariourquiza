<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\CanResetPassword;
use App\Notifications\VerifyEmail;

class User extends Authenticatable implements CanResetPassword, MustVerifyEmail
{
    use SoftDeletes;
    use HasApiTokens, HasFactory, HasRoles, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'typedoc',
        'numdoc',
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
        'institution',
        'province'
    ];

    protected $guarded = [
        'id',
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

    public function student()
    {
        return $this->hasOne(Student::class);
    }

    /**
     * Send the email verification notification.
     *
     * @return void
     */
    public function sendEmailVerificationNotification()
    {
        $this->notify(new VerifyEmail); // my notification
    }

    public function __get($key)
    {
        if (is_string($this->getAttribute($key)) && $key != 'email' && $key != 'password') {
            return strtoupper($this->getAttribute($key));
        } else {
            return $this->getAttribute($key);
        }
    }

    public function setTypedocAttribute($value)
    {
        $this->attributes['typedoc'] = strtoupper($value);
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtoupper($value);
    }

    public function setSurnameAttribute($value)
    {
        $this->attributes['surname'] = strtoupper($value);
    }

    public function setNationalityAttribute($value)
    {
        $this->attributes['nationality'] = strtoupper($value);
    }

    public function setAddressAttribute($value)
    {
        $this->attributes['address'] = strtoupper($value);
    }

    public function setProvinceAttribute($value)
    {
        $this->attributes['province'] = strtoupper($value);
    }

    public function setLocalityAttribute($value)
    {
        $this->attributes['locality'] = strtoupper($value);
    }

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = strtoupper($value);
    }

    public function setInstitutionAttribute($value)
    {
        $this->attributes['institution'] = strtoupper($value);
    }
}
