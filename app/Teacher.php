<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
  protected $table = "teachers";

  public function teachers(){
    return $this->belongsTO('App\User');
  }
}