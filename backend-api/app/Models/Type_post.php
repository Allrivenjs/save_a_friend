<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type_post extends Model
{
    use HasFactory;

    public $table = "type_post";
    protected  $guarded = ['id', 'created_at', 'updated_at'];


    public function posts()
    {
        return $this->hasOne(Post::class);
    }
}
