<?php

namespace App\Http\Controllers;

use App\CountyList;
use App\CountyPromoCode;
use App\CountyPromoRelation;
use App\EntityEnding;
use App\Mail\OrderMail;
use App\Order;
use App\umTransaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function docRetrievalService(Request $request)
    {

        $data = array();

        $data['entityEndings'] = EntityEnding::getEndings();
        $data['active_menu_item'] = 'doc-retrieval';
        $data['price'] = 0;
        $data['is_not_sure'] = false;
        $data['save_action'] = route('service.docretrievalsave');
        $data['countyList'] = CountyList::getCountyListWithoutPreffixForService();



        return view('services.dokretrieval', $data);
    }


    public function routeHomePage(Request $request)
    {
        $all_data = $request->all();
        $data = array();

        if ($all_data['county'] == 0) {
            $data['price'] = 0;

            $data['is_not_sure'] = true;
            $data['entity_name'] = $all_data['entity_name'];
            $data['entity_ending'] = $all_data['entity_ending'];
            $data['entityEndings'] = EntityEnding::getEndings();
            $data['active_menu_item'] = 'publish-now';
            $data['save_action'] = route('service.notSureSave');
            $data['countyList'] = CountyList::getCountyListWithoutPreffixForService();

            return view('services.not-sure-county', $data);

        } else {
            $data['is_not_sure'] = false;
            $data['save_action'] = route('service.publishingSave');

            $data['entity_name'] = $all_data['entity_name'];
            $data['entity_ending'] = $all_data['entity_ending'];
            $data['countyList'] = CountyList::getCountyListWithoutPreffixForService(1);
            $data['entityEndings'] = EntityEnding::getEndings();
            $data['active_menu_item'] = 'publish-now';
            $data['county'] = CountyList::getCounty($all_data['county']);
            $data['base_price_name'] = 'Publishing';
            $data['price'] = CountyList::getCurrentPrice($data['county'], 0); //TODO get data from db


            return view('services.apply-now', $data);

        }
    }

    public function docRetrievalServiceSave(Request $request)
    {

        $order = new Order();
        $product_data = $request->all();
        $order->entity_name = $product_data['entity_name'];
        $order->entity_ending = $product_data['entity_ending'];
        $order->county = $product_data['selected_county'];
        $order->promo = $product_data['promo_code'];

        $order->service = 'Document Retrieval';
        $order->service_type = '';


        $data = $product_data;

        $order->data = json_encode($product_data);
        $order->save();

        if($product_data['total_price'] ) {
            $tran = new umTransaction();


            $tran->key = "CwRPz2aB3a0VtaROk79qQeH8095266BK";      // Your Source Key
            $tran->pin = "1234";      // Source Key Pin
            $tran->usesandbox = false;     // Sandbox true/false
            $tran->ip = $_SERVER['REMOTE_ADDR'];   // This allows fraud blocking on the customers ip address
            $tran->testmode = 0;    // Change this to 0 for the transaction to process

            $tran->command = "cc:sale";//    // Command to run; Possible values are: cc:sale, cc:authonly, cc:capture, cc:credit, cc:postauth, check:sale, check:credit, void, void:release, refund, creditvoid and cc:save. Default is cc:sale.

            $tran->card = $product_data['curd_number'];     // card number, no dashes, no spaces
            $tran->exp = str_replace('/', '', $product_data['expiration_date']);          // expiration date 4 digits no /
            $tran->amount = $product_data['base_main_price'];           // charge amount in dollars
            $tran->invoice = (string)$order->id;          // invoice number.  must be unique.
            $tran->cardholder = $product_data['cardholder_name'];   // name of card holder
            $tran->street = $product_data['billing_address'];   // street address
            $tran->zip = $product_data['billing_zip'];         // zip code
            $tran->description = "LEGALBOX service";  // description of charge
            $tran->cvv2 = $product_data['cvv_number'];          // cvv2 code

            flush();

            if ($tran->Process()) {

            } else {
//            return redirect()->route('service.step-5', ['trans_error' => $tran->error]);
            }
        }
        Mail::to($product_data['contact_email'])->send(new OrderMail($order));
        Mail::to(config('mail.mail_site_admin'))->send(new OrderAdminMail($order));
        return view('services.thank-you', $data);
    }

    public function publishingSave(Request $request)
    {
        $order = new Order();
        $product_data = $request->all();
        $order->entity_name = $product_data['entity_name'];
        $order->entity_ending = $product_data['entity_ending'];
        $order->county = $product_data['selected_county'];
        $order->promo = $product_data['promo_code'];

        $order->service = 'Publishing';
        $order->service_type = $product_data['service_main_type'] ? 'Foreign' : 'Domestic';


        $data = $product_data;

        if ($product_data['copy'] == 'I will upload a copy of the application of authority') {
            $files = $request->file('application_copy', '');

            if (!empty($files)) {
                $destinationPath = 'file_storage/';

                $file_main = $files->store('public/', 'local');
                $path_main = Storage::disk('local')->path($file_main);
                $originalFile = $files->getClientOriginalName();
                $filename = $originalFile;

                $product_data['application_copy'] = $file_main;
            }
        }

        $order->data = json_encode($product_data);
        $order->save();

        if($product_data['total_price']) {
            $tran = new umTransaction();


            $tran->key = "CwRPz2aB3a0VtaROk79qQeH8095266BK";      // Your Source Key
            $tran->pin = "1234";      // Source Key Pin
            $tran->usesandbox = false;     // Sandbox true/false
            $tran->ip = $_SERVER['REMOTE_ADDR'];   // This allows fraud blocking on the customers ip address
            $tran->testmode = 0;    // Change this to 0 for the transaction to process

            $tran->command = "cc:sale";//    // Command to run; Possible values are: cc:sale, cc:authonly, cc:capture, cc:credit, cc:postauth, check:sale, check:credit, void, void:release, refund, creditvoid and cc:save. Default is cc:sale.

            $tran->card = $product_data['curd_number'];     // card number, no dashes, no spaces
            $tran->exp = str_replace('/', '', $product_data['expiration_date']);          // expiration date 4 digits no /
            $tran->amount = $product_data['base_main_price'];           // charge amount in dollars
            $tran->invoice = (string)$order->id;          // invoice number.  must be unique.
            $tran->cardholder = $product_data['cardholder_name'];   // name of card holder
            $tran->street = $product_data['billing_address'];   // street address
            $tran->zip = $product_data['billing_zip'];         // zip code
            $tran->description = "LEGALBOX service";  // description of charge
            $tran->cvv2 = $product_data['cvv_number'];          // cvv2 code

            flush();

            if ($tran->Process()) {

            } else {
//            return redirect()->route('service.step-5', ['trans_error' => $tran->error]);
            }
        }
        Mail::to($product_data['contact_email'])->send(new OrderMail($order));
        Mail::to(config('mail.mail_site_admin'))->send(new OrderAdminMail($order));

        return view('services.thank-you', $data);
    }

    public function notSureSave(Request $request)
    {
        $order = new Order();
        $product_data = $request->all();
        $order->entity_name = $product_data['entity_name'];
        $order->entity_ending = $product_data['entity_ending'];
        $order->county = $product_data['selected_county'];
        $order->promo = '';

        $order->service = 'Publishing';
        $order->service_type = $product_data['service_main_type'] ? 'Foreign' : 'Domestic';


        $data = $product_data;

        if ($product_data['copy'] == 'I will upload a copy of the application of authority') {
            $files = $request->file('application_copy', '');

            if (!empty($files)) {
                $destinationPath = 'file_storage/';

                $file_main = $files->store('public/', 'local');
                $path_main = Storage::disk('local')->path($file_main);
                $originalFile = $files->getClientOriginalName();
                $filename = $originalFile;

                $product_data['application_copy'] = $file_main;
            }
        }

        $order->data = json_encode($product_data);
        $order->save();

        if($product_data['total_price'] && 0) {
            $tran = new umTransaction();


            $tran->key = "CwRPz2aB3a0VtaROk79qQeH8095266BK";      // Your Source Key
            $tran->pin = "1234";      // Source Key Pin
            $tran->usesandbox = false;     // Sandbox true/false
            $tran->ip = $_SERVER['REMOTE_ADDR'];   // This allows fraud blocking on the customers ip address
            $tran->testmode = 0;    // Change this to 0 for the transaction to process

            $tran->command = "cc:sale";//    // Command to run; Possible values are: cc:sale, cc:authonly, cc:capture, cc:credit, cc:postauth, check:sale, check:credit, void, void:release, refund, creditvoid and cc:save. Default is cc:sale.

            $tran->card = $product_data['curd_number'];     // card number, no dashes, no spaces
            $tran->exp = str_replace('/', '', $product_data['expiration_date']);          // expiration date 4 digits no /
            $tran->amount = $product_data['base_main_price'];           // charge amount in dollars
            $tran->invoice = (string)$order->id;          // invoice number.  must be unique.
            $tran->cardholder = $product_data['cardholder_name'];   // name of card holder
            $tran->street = $product_data['billing_address'];   // street address
            $tran->zip = $product_data['billing_zip'];         // zip code
            $tran->description = "LEGALBOX service";  // description of charge
            $tran->cvv2 = $product_data['cvv_number'];          // cvv2 code

            flush();

            if ($tran->Process()) {

            } else {
//            return redirect()->route('service.step-5', ['trans_error' => $tran->error]);
            }
        }
        Mail::to($product_data['contact_email'])->send(new OrderMail($order));
        Mail::to(config('mail.mail_site_admin'))->send(new OrderAdminMail($order));

        return view('services.thank-you', $data);
    }

    public function promoCode(Request $request)
    {
        $promo_code_input = $request->input('promocode');

        $data = array(
            'errors' => '',
            'data' => array(),
            'promo_code' => $promo_code_input,
        );

        $promo_code = CountyPromoCode::where('promo_code', $promo_code_input)->where('expiration_time', '>=', Carbon::today())->where('activate', 1)->first();

        if ($promo_code) {
            $request->session()->forget('county_promo_id'); //TODO delete after complite county promo code

            $county_type = 0;

            if ($request->input('service_type')) {
                $county_type = 1;
            }

            $allServiceTypes = CountyPromoRelation::where('county_promo_id', $promo_code->id)->where('county_type', $county_type)->get();
            $data['data'] = $allServiceTypes;
        } else {
            $data['errors'] = 'expired_invalide';
        }

        return json_encode($data);
    }
}
