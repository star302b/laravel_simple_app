<?php

namespace App\Http\Controllers;

use App\CountyList;
use App\EntityEnding;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function docRetrievalService(Request $request){

        $data = array();

        $data['entityEndings'] = EntityEnding::getEndings();
        $data['active_menu_item'] = 'doc-retrieval';
        $data['is_not_sure'] = false;
        $data['save_action'] = route('service.docretrievalsave');


        return view('services.dokretrieval', $data);
    }
    public function docRetrievalServiceSave(Request $request){

        $data = array();

        return view('services.dokretrieval', $data);
    }




    public function routeHomePage(Request $request){
        $all_data = $request->all();
        if($all_data['county'] == 0){
            $data = array();
            $data['is_not_sure'] = true;
            $data['entity_name'] = $all_data['entity_name'];
            $data['entity_ending'] = $all_data['entity_ending'];

            $data['entityEndings'] = EntityEnding::getEndings();
            $data['active_menu_item'] = 'publish-now';
            $data['save_action'] = route('service.notSureSave');
            $data['countyList'] = CountyList::getCountyListWithoutPreffix();

            return view('services.not-sure-county', $data);

        }else{
            $data['is_not_sure'] = false;
            $data['save_action'] = route('service.publishingSave');

            $this->publishingOther($request);
        }
    }

   public function publishingSave(Request $request){
       $data = array();

       return view('services.dokretrieval', $data);
   }

   public function notSureSave(Request $request){
       $data = array();

       return view('services.dokretrieval', $data);
   }
}
