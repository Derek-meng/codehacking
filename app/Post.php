<?php

namespace App;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Model;
use JellyBool\Translug\Translug;

class Post extends Model
{
    //
//    use Sluggable;
//    public function sluggable()
//    {
//        return [
//            'slug' => [
//                'source' => 'title',
//                'unique' => true,
//            ]
//        ];
//    }
    use Sluggable;
    use SluggableScopeHelpers;


    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title',
                'onUpdate' => true
            ],
        ];
    }
    protected $fillable = [
        'title',
        'body',
        'category_id',
        'user_id',
        'photo_id'
    ];
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function photo(){
        return $this->belongsTo('App\Photo');
    }
    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function comments()
    {
        return $this->hasMany('App\comment');
    }

}
