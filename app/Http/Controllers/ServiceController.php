<?php

namespace App\Http\Controllers;

use App\EntityEnding;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function docRetrievalService(Request $request){

        $data = array();

        $data['entityEndings'] = EntityEnding::getEndings();

        return view('services.dokretrieval', $data);
    }
    public function docRetrievalServiceSave(Request $request){

        $data = array();

        return view('services.dokretrieval', $data);
    }
}
