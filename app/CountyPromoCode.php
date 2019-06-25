<?php

namespace App;

use App\Observers\CountyPromoCodeObserver;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $promo_code
 * @property string $file
 * @property boolean $activate
 * @property string $created_at
 * @property string $updated_at
 */
class CountyPromoCode extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['promo_code', 'file', 'activate', 'created_at', 'updated_at','client_name','notes','expiration_time'];

    protected $dispatchesEvents = [
        'saving' => CountyPromoCodeObserver::class,
        'created' => CountyPromoCodeObserver::class,
    ];

}
