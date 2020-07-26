<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Models\Role;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','contact','address','role','enrollment','studentsclass','div',
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

    public function isAdmin()
    {
        return $this->role == 'Admin'; 
    }

    public function isTeacher()
    {
        return $this->role == 'Teacher' || $this->role == 'Admin'; 
    }

    public function hasRole($role)
    {
        return $this->role == $role;
    }
    
     public function setIsAttandance($value)
    {
        $this->attributes['isAttandance'] = $value;
    }

}
