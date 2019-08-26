<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Photo extends Model
{ 
    protected $uploads = '/images/';

    public function user()
    {

      return $this->belongsTo(User::class);

    }


      public function getPathAttribute($photo)//hame akshaee ke mikhahim namayesh dahim az 
      //tarigh in method masyre daghigh migirand...tavasot khasyat ..Laravel accessors.
    {

      return $this->uploads . $photo ;

    }
    public function posts()
    {

     return $this->hasMany(Post::class);
      

    }


}