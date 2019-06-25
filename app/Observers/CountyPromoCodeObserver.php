<?php

namespace App\Observers;

use App\CountyPromoCode;
use App\CountyPromoRelation;
use App\Imports\CountyMultipleImport;
use App\Imports\CountyPromoDomesticImport;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;


class CountyPromoCodeObserver
{

    /**
     * Handle to the User "created" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function created(CountyPromoCode $promo_code)
    {
        if(isset($promo_code->id)) {
            $promo_code_file = Storage::disk('admin')->path($promo_code->file);
            Log::debug('An informational message.');
            Log::debug('Old path = '. $promo_code_file);

            if($promo_code_file[0] != '/'){
                $promo_code_file = '/'.$promo_code_file;
            }
            Log::debug('New path = '. $promo_code_file);

            Excel::import(new CountyMultipleImport($promo_code->id),$promo_code->file,'admin');
        }
        return '';
    }
    /**
     * Handle the state "saving" event.
     *
     * @param  \App\State  $state
     * @return void
     */
    public function saving(CountyPromoCode $promo_code)
    {
        if(isset($promo_code->id)) {
            CountyPromoRelation::where('county_promo_id',$promo_code->id)->delete();
            $promo_code_file = Storage::disk('admin')->path($promo_code->file);
            Log::debug('An informational message.');
            Log::debug('Old path = '. $promo_code_file);

            if($promo_code_file[0] != '/'){
                $promo_code_file = '/'.$promo_code_file;
            }
            Log::debug('New path = '. $promo_code_file);
//            (new AdditionalServiceImport())->withOutput($this->output)->import('UsacorpExportServiceDataNew.xls');
            Excel::import(new CountyMultipleImport($promo_code->id),$promo_code->file,'admin');
//            Excel::import(new CountyPromoDomesticImport($promo_code->id), $promo_code_file);
        }
        return '';
    }
}
