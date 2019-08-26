<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Role extends Model
{
   public function users()
   {
    return $this->belongsToMany(User::class);

   }
} 
