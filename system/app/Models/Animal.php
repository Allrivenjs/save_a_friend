<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;

    protected  $guarded = ['id', 'created_at', 'updated_at'];

    // uno a muchos inversa
    function User(){
        return $this->belongsTo(User::class);
    }


    //relacion muchos a muchos
    function consultorios(){
        return $this->belongsToMany(Consultorio::class);
    }
}
