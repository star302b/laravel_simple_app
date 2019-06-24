<?php

namespace App\Http\Controllers;

use App\Mail\LowestPriceMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PriceMatchController extends Controller
{
    public function index(Request $request){
        return view('pages.lowest_price.index');
    }

    public function store(Request $request)
    {
        $all_data = $request->all();
        $data=array();
        $data = $all_data;

        Mail::to(config('mail.mail_site_admin'))->send(new LowestPriceMail($data,$request->ip()));
        return view('pages.lowest_price.thankyou',$data);
    }
}
