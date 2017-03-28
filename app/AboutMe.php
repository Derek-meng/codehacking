<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AboutMe extends Model
{
    //
    protected $fillable=[
        'is_active',
        'photo',
        'body',
        'title',
    ];

}
