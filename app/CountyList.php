<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Self_;

class CountyList extends Model
{
    public static function getCountyListWithoutPreffix(){
        $all_countys = self::getCountyList();
        $new_countis = array();
        foreach ($all_countys as $key => $all_county){
            if($key != 0 ){
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
