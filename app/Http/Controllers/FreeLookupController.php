<?php

namespace App\Http\Controllers;

use App\EntityEnding;
use App\Mail\FreeLookupMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FreeLookupController extends Controller
{
    public function index(Request $request){
        $data = array();

        $data['active_menu_item'] = 'free-lookup';
        $data['entityEndings'] = EntityEnding::getEndings();

        return view('pages.free_lookup.index',$data);
    }

    public function store(Request $request)
    {
        $all_data = $request->all();
        $data=array();
        $data = $all_data;
        $data['active_menu_item'] = 'free-lookup';

        Mail::to(config('mail.mail_site_admin'))->send(new FreeLookupMail($data,$request->ip()));
        return view('pages.free_lookup.thankyou',$data);
    }
}
