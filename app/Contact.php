<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //
    protected $fillable=[
        'name',
        'email',
        'body',
        'is_active',
        'title',
    ];

    public function reply_message()
    {
        return $this->hasOne('App\MessageReply');
    }
}
