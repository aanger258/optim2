<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserGroup extends Model
{

	protected $fillable = [
		'group_name','status','created_at','updated_at'
	];

    public function roles(){
    	return $this->hasMany('App\GroupRoles','group_id','id');
    }
}
