<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use jeremykenedy\LaravelRoles\Traits\HasRoleAndPermission;

class User extends Authenticatable implements JWTSubject
{
  use HasRoleAndPermission;
  use Notifiable;
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'age',
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

    public function rentals(){
      return $this->hasMany("App\Models\GameRental");
  }

  public function defaultResponse(){
    return [
        'name' => $this['name'],
        'email' => $this['email'],
        'age' => $this['age'],
    ];
}


    public function getJWTIdentifier()
    {
      return $this->getKey();
    }
    public function getJWTCustomClaims()
    {
      return [];
    }
  
}
