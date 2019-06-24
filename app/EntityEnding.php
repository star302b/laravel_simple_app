<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EntityEnding extends Model
{
    public static function getEndings(){
        return ["LLC","L.L.C.","LP","LLP","Limited Liability Company","PLLC"];
    }
}
