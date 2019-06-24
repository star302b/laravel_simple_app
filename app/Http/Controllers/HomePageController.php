<?php

namespace App\Http\Controllers;

use App\CountyList;
use App\EntityEnding;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index(Request $request)
    {
        $data = array();

        $data['entityEndings'] = EntityEnding::getEndings();
        $data['countyList'] = CountyList::getCountyList();

        return view('home-page',$data);
    }
}
