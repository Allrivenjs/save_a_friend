<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class type_post extends Model
{
    use HasFactory;
    protected  $guarded = ['id', 'created_at', 'updated_at'];


    public function posts()
    {
        return $this->hasOne(posts::class);
    }

}
