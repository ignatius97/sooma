<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Class_Discusion extends Model
{
    //



     public function scopeCommonResponse($query) {

        return $query->leftJoin('users' , 'class__discusions.user_id' , '=' , 'users.id')
        	->select(
            'class__discusions.id as class_id',
            'class__discusions.user_id',
            'users.name as username',
            'users.picture as picture',
            'class__discusions.comment as comment',
			\DB::raw("DATE_FORMAT(class__discusions.created_at, '%M %Y') as created"),           
            'class__discusions.created_at',
            'class__discusions.updated_at'
            );
    
    }

    public function toArray()
    {
        $array = parent::toArray();

        $array['diff_human_time'] = ($this->created_at) ? $this->created_at->diffForHumans() : 0;

        return $array;
    }

}
