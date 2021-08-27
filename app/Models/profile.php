<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class profile extends Model
{
    use HasFactory;
    protected $table = "profiles";
    protected  $guarded = ['id', 'created_at', 'updated_at'];


    function location(){
        return $this->belongsTo(Location::class);
    }

    function user(){
        return $this->belongsTo(User::class);
    }
}
