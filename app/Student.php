<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'full_name',
        'email',
        'password',
        'phonenumber',

        'department',
        'course',
        'year',
        'title',

        'title',
        'photo_link',
        'verification_code',
        'verification_status',
        'meta',

    ];


    protected $hidden = [
        'remember_token',
    ];
}
