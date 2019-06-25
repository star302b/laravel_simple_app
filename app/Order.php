<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['id', 'entity_name', 'entity_ending', 'created_at', 'updated_at','county','promo','data','service_type','service'];

}
