<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MessageReply extends Model
{
    //
    protected $fillable = [
        'body',
        'contact_id',
    ];
    public function contact(){
        return $this->belongsTo('App\Contact');
    }
}
