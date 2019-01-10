<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    // table name
    protected $table = "teachers";

    protected $fillable=[
        'first_name','last_name','address','phone','email','short_desc','long_desc','menu_id','image','status'
      ];

      public function getFeaturedAttribute($teacher_image){
        // return $featured;
        return asset($teacher_image);
      
      }
    
}
