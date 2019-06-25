<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CountyPrice extends Model
{
    protected $fillable = ['county_name','price','county_type'];

    public function getCountyTypeAttribute($county_type)
    {
        if($county_type == 0){
            return 'Domestic';
        }
        return 'Foreign';
    }
}
