<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public $timestamps = false;
    protected $table = 'citiesaaaa';


    public function getRegion(){
        return $this->belongsTo('App\Zone','county_id','id')->select(array('name'));
    }
}
