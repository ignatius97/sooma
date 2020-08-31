<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Classes;

class Curriculum extends Model
{
    //

     protected $fillable=['name', 'description', 'picture'];



     public function abbreviation()
    {
        return $this->hasOne('App\Classes');
    }
}
