<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupRoles extends Model
{
    protected $table = 'group_roles';

    protected $fillable =[
    	'group_id', 'role_id'
    ];

    public $timestamps = false;

}
