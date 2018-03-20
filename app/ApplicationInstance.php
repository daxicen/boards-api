<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class ApplicationInstance extends Authenticatable
{
    use Notifiable;

    protected $fillable = [

        'student_id',
        'verification_status',
        'registration_status',
        'phone_details',

    ];

}
