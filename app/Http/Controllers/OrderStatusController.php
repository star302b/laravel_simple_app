<?php

namespace App\Http\Controllers;

use App\Mail\OrderStatusMail;
use App\Mail\OrderStatusUserMail;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrderStatusController extends Controller
{
    public function index(Request $request){
        $data = array();
        $data['active_menu_item'] = 'order-status';
        return view('pages.order_status.index',$data);
    }

    public function store(Request $request)
    {
        $all_data = $request->all();
        $data=array();
        $data = $all_data;
        $data['active_menu_item'] = 'order-status';

        $capthca_check = false;
        if (!empty($all_data['g-recaptcha-response'])) {
            $client = new Client();
            $res = $client->request('POST', 'https://www.google.com/recaptcha/api/siteverify', [
                'form_params' => [
                    'secret' => '6LfdaHwUAAAAAKm6NUlh09wmVTRqsjzLBJ1wjaS_',
                    'response' => $all_data['g-recaptcha-response'],
                ]
            ]);
            $capthca_check = $res->getStatusCode() == 200 ? true : false;
        }
        if (!$capthca_check) {
            return json_encode(['error' => ['captcha']]);
        }else{

            Mail::to(config('mail.mail_site_admin'))->send(new OrderStatusMail($all_data,$request->ip()));
            if(isset($all_data['email']) && !empty($all_data['email'])) {
                Mail::to($all_data['email'])->send(new OrderStatusUserMail($all_data));
            }
            if(isset($all_data['order-email']) && !empty($all_data['order-email'])) {
                Mail::to($all_data['order-email'])->send(new OrderStatusUserMail($all_data));
            }

            return view('pages.order_status.thankyou',$data);
        }
    }
}
