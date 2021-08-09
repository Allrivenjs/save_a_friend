<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultorio extends Model
{
    use HasFactory;

    protected $table= "consultorios";
    protected  $guarded = ['id', 'created_at', 'updated_at'];


    //relacion muchos a muchos
    function animals(){
        return $this->belongsToMany(Animal::class);
    }

    function consultorio(){
        return $this->morphTo();
    }

}
