<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AboutMe extends Model
{
    //
    protected $fillable=[
        'is_active',
        'photo_id',
        'body',
        'title',
    ];
    public function photo(){
        return $this->belongsTo('App\Photo');
    }

}
