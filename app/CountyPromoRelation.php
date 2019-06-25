<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $county_promo_id
 * @property string $county
 * @property int $price
 * @property string $created_at
 * @property string $updated_at
 * @property CountyPromoCode $countyPromoCode
 */
class CountyPromoRelation extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['county_promo_id', 'county', 'price','county_type', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function countyPromoCode()
    {
        return $this->belongsTo('App\CountyPromoCode', 'county_promo_id');
    }
}
