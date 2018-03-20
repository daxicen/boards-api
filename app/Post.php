<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Post extends Authenticatable
{
    use Notifiable;

    protected $fillable = [

        'category',

        'target',
        'department',
        'course',
        'year',

        'heading',
        'message',
        'sender_name',
        'sender_title',

        'attachment',
        'pdf_link',
        'picture_link',
        'img_url',

    ];

}
