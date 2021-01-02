<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Permissions\HasPermissionsTrait;

class User extends Authenticatable
{
   // use Notifiable;
   use HasPermissionsTrait; //Import The Trait

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    public function city()
    {
        return $this->belongsTo(City::class);
    }
   
    public function state()
    {
        return $this->belongsTo(State::class);
    }
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
    public function hasRole()
    {
        return $this->role->name;
    } 
    public function hasCity()
    {
        return $this->city->name;
    }
    public function hasState()
    {
        return $this->state->name;
    }
    public function hasCompany()
    {
        return $this->company->name;
    }

}
