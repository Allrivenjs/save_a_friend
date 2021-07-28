<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tags extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug','color'];

    public function getRouteKeyName()
    {
        return "slug";
    }


    //relacion muchos a muchos
    function posts(){
        return $this->belongsToMany(posts::class);
    }
}
