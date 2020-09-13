<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    //

     protected $fillable=['country_name', 'description', 'picture', 'created_at', 'updated_at'];

     
     public function video()
    {
        return $this->hasMany('App\VideoTape');
    }
}
