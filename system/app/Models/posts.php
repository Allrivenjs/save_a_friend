<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class posts extends Model
{
    use HasFactory;

    protected  $guarded = ['id', 'created_at', 'updated_at'];

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
        return $this->belongsToMany(tags::class);
    }

    //relacion uno a uno polimorfica
    function image(){
        return $this->morphOne(images::class, 'imageable');
    }

    public function type_post()
    {
        return $this->belongsTo(type_post::class);
    }


}
