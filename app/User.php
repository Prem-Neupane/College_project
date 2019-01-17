<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
class User extends Authenticatable
{
    use Notifiable;
  
    protected $fillable = [
        'first_name','last_name','username','email', 'password','identity','gender'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    
}
 class teachers extends Model
{
    public function teachers(){
        return $this->hasMany('App\Teacher');
    }
}