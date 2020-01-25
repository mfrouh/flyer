<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
  public function flyers()
  {
      return $this->hasMany('App\flyer');
  }
}
