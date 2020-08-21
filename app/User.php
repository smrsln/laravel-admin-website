<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    protected $fillable = [
        'name', 'email', 'password','is_admin','is_member',
    ];

    protected $hidden = [
        'password', 'remember_token','is_admin','is_member',
    ];

    protected $dates = ['deleted_at'];

    public function isAdmin()
    {
        return $this->is_admin;
    }
}