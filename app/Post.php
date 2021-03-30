<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'body', 'author_id'];

    public function author() {
        return $this->belongsTo('App\Author'); // o Author::class
    }

    public function comment() {
        return $this->hasMany('App\Comment');
    }
}
