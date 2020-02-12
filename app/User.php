<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Spatie\Permission\Traits\HasRoles;
use Givebutter\LaravelKeyable\Keyable;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;
    use Keyable;

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


    /**
     * Check if User belongs to provided role
     * 
     * @param $roleName string - user's role name to check
     */
    public function is($roleName) {
        foreach ($this->roles as $role) {
            if (strtolower($role->name) === strtolower($roleName)) {
                return true;
            }
        }
        return false;
    }
}
