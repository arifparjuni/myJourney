<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Post extends Model
{
    public $fillable = ['title', 'body', 'cover_image', 'user_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
