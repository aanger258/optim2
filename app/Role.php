<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

	protected $fillable = [
        'access_path'
    ];

    public $timestamps = false;

    public function groups(){
    	return $this->belongsTo('App\GroupRoles','id','role_id');
    }
}
