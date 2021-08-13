<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    use HasFactory;
    protected $table= "posts";
    protected  $guarded = ['id', 'created_at', 'updated_at'];

    public static function boot(){

        parent::boot();
        if(! \App::runningInConsole()) {
             static::creating(function ($post){
                 $post->user_id=Auth::id();
             });

        }
    }


    public function getRouteKeyName()
    {
        return "slug";
    }
    //relacion uno a muchos inversa

    function user(){
        return $this->belongsTo(User::class);
    }

    function category(){
        return $this->belongsTo(category::class);
    }

    //relacion muchos a muchos
    function tags(){
        return $this->belongsToMany(Tag::class);
    }

    //relacion uno a uno polimorfica
    function image(){
        return $this->morphOne(Image::class, 'imageable');
    }

    public function type_post()
    {
        return $this->belongsTo(Type_post::class);
    }

}
