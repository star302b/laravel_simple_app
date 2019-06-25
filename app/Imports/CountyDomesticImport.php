<?php

namespace App\Imports;

use App\Admin\Controllers\CountyPromoRelationController;
use App\CountyPrice;
use App\CountyPromoCode;
use App\CountyPromoRelation;
use Maatwebsite\Excel\Concerns\ToModel;

class CountyDomesticImport implements ToModel
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
        if($exist_promo_code = CountyPrice::where('county_name',$row[0])->where('price',$row[1])->where('county_type',0)->first()){
            return $exist_promo_code;
        }else {
            return new CountyPrice([
                'county_name' => $row[0],
                'price' => (int)$row[1],
                'county_type' => 0,
            ]);
        }
    }
}
