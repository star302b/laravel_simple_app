<?php

namespace App\Imports;

use App\Admin\Controllers\CountyPromoRelationController;
use App\CountyPromoCode;
use App\CountyPromoRelation;
use Maatwebsite\Excel\Concerns\ToModel;

class CountyPromoDomesticImport implements ToModel
{
    protected $promo_code_id;
    public function __construct($promo_code_id)
    {
        $this->promo_code_id = $promo_code_id;
    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if($exist_promo_code = CountyPromoRelation::where('county_promo_id',$this->promo_code_id)->where('county',$row[0])->where('price',$row[1])->where('county_type',0)->first()){
            return $exist_promo_code;
        }else {
            return new CountyPromoRelation([
                'county_promo_id' => $this->promo_code_id,
                'county' => $row[0],
                'price' => (int)$row[1],
                'county_type'=> 0,
            ]);
        }
    }
}
