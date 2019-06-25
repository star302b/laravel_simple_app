<?php

namespace App;

use App\Observers\CountyImportObserver;
use Illuminate\Database\Eloquent\Model;

class CountyImport extends Model
{
    protected $table = 'county_import';

    protected $fillable = ['file'];

    protected $dispatchesEvents = [
        'saving' => CountyImportObserver::class,
        'created' => CountyImportObserver::class,
    ];
}
