<?php

namespace App\Http\Controllers;

use App\Mail\ContactFromMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index(Request $request){

        return view('pages.contact.index');
    }
    public function store(Request $request)
    {
        $all_data = $request->all();

        $business_name = $all_data['company_name'] ? $all_data['company_name'] : '';
        $email = $all_data["email"] ? $all_data["email"] : '';
        $username = $all_data["username"] ? $all_data["username"] : '';
        $phone = $all_data["phone"] ? $all_data["phone"] : '';
        $message = $all_data["comment"] ? $all_data["comment"] : '';

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
            return view('pages.contact.index',['error' => ['captcha']]);
            return json_encode(['error' => ['captcha']]);
        }else{

            Mail::to(config('mail.mail_site_admin'))->send(new ContactFromMail($all_data,$request->ip()));
            return view('pages.contact.index');

        }

    }
}
