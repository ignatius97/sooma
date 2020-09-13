<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Classes;

class Curriculum extends Model
{
    //

     protected $fillable=['name', 'description', 'picture'];



     public function video()
    {
        return $this->hasMany('App\VideoTape');
    }

     public function curriculum()
    {
        return $this->hasMany('App\Classes');
    }
}
