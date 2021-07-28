<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;

    protected $fillable = ['name','slug'];

    public function getRouteKeyName()
    {
        return "slug";
    }

    //Relacion uno a muchos

    public function posts(){
        return $this->hasMany(posts::class);
    }
}
