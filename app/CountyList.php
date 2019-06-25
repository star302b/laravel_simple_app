<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Self_;

class CountyList extends Model
{

    public static function getCounty($county_id){
        return self::getCountyListWithoutPreffix()[$county_id];
    }
    public static function getCurrentPrice($name,$type){
        if($county_price = CountyPrice::where('county_name',$name)->where('county_type',$type)->first())
            return $county_price->price;
        return 0;
    }
    public static function getPrice($name,$type){
        if($county_price = CountyPrice::where('county_name',$name)->where('county_type',$type)->first())
            return $county_price->price;
        return 0;
    }
    public static function getCountyListWithoutPreffixForService($type = 0){
        $all_countys = self::getCountyList();
        $new_countis = array();
        foreach ($all_countys as $key => $all_county){
            if($key != 0 && $all_county != 'New York County'){
                $new_countis[$key]['name'] = str_replace(' County','',$all_county);
                $new_countis[$key]['price'] = self::getPrice($new_countis[$key]['name'],$type);
            }
        }
        return $new_countis;
    }
    public static function getCountyListWithoutPreffix(){
        $all_countys = self::getCountyList();
        $new_countis = array();
        foreach ($all_countys as $key => $all_county){
            if($key != 0){
                $new_countis[] = str_replace(' County','',$all_county);
            }
        }
        return $new_countis;
    }
    public static function getCountyList(){
        return [
            'Not Sure, please check with NY DOS',
            'Albany County',
            'Allegany County',
            'Bronx County',
            'Broome County',
            'Cattaraugus County',
            'Cayuga County',
            'Chautauqua County',
            'Chemung County',
            'Chenango County',
            'Clinton County',
            'Columbia County',
            'Cortland County',
            'Delaware County',
            'Dutchess County',
            'Erie County',
            'Essex County',
            'Franklin County',
            'Fulton County',
            'Genesee County',
            'Greene County',
            'Hamilton County',
            'Herkimer County',
            'Jefferson County',
            'Kings County',
            'Lewis County',
            'Livingston County',
            'Madison County',
            'Monroe County',
            'Montgomery County',
            'Nassau County',
            'New York County',
            'Niagara County',
            'Oneida County',
            'Onondaga County',
            'Ontario County',
            'Orange County',
            'Orleans County',
            'Oswego County',
            'Otsego County',
            'Putnam County',
            'Queens County',
            'Rensselaer County',
            'Richmond County',
            'Rockland County',
            'Saratoga County',
            'Schenectady County',
            'Schoharie County',
            'Schuyler County',
            'Seneca County',
            'St Lawrence County',
            'Steuben County',
            'Suffolk County',
            'Sullivan County',
            'Tioga County',
            'Tompkins County',
            'Ulster County',
            'Warren County',
            'Washington County',
            'Wayne County',
            'Westchester County',
            'Wyoming County',
            'Yates County'
        ];
    }
}
