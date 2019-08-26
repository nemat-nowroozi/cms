<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
  public function post()
    {
        
        return $this->belongsTo(Post::class);

    }




  public function replies()//self relation //rabethe bakhode video 60
  {

    return $this->hasMany(Comment::class , 'parent_id');
  }



}
