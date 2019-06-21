@php
    $all_product_order_data_main = '';
    $flag_exit_loop = false;
    $all_product_order_data = '';

    if(isset($order->data)){
        $all_product_order_data = json_decode($order->data);
    }

    $main_Service_Id = $service_id;
    $main_State_Id = $state_id;
@endphp
@if($all_product_order_data)
    <div id="wrapper" style="width: 800px;margin: 0 auto;padding: 60px 0;">
        <span class="page-title" style="display: block;margin: 0 0 16px;font-size: 31px;">
            <strong>
                Order
                </strong>
            #{{$order->order_id}} Summary:
        </span>
        <div class="order-box" style="margin: 0 0 20px;border: 2px solid #f8b102;padding: 20px 16px;">
            <div class="title-row" style="border-bottom: 3px solid #f8b102;padding: 0 0 8px;margin: 0 0 5px;">
                <span class="new" style="display: inline-block;padding: 5px 38px 5px 10px;background: #f8b102;margin-right: 12px;">
                    {{ \App\Service::where('id',$main_Service_Id)->first()->new_entity ? 'New' : 'Existing' }}
                </span>
                <span class="name" style="display: inline-block;font-weight: bold;font-size: 20px;">
                        {{$state_name}}
                    <span class="sep" style="display: inline-block;vertical-align: middle;margin: 0 10px;width: 2px;height: 26px;background: #f8b102;">
                    </span>
                    {{$service_name}}
                </span>
            </div>
            <table class="order-table" style="border-collapse: collapse;width: 100%;">
                <thead>
                <tr>
                    <td colspan="2" class="head-1" style="padding: 3px 30px 3px 0;vertical-align: bottom;padding-bottom: 15px;font-size: 19px;">
                        <strong style="display: block;font-style: 21px;">
                                <span class="mark" style="color: #f8b102;">
                                    Entity:
                                </span>
                            @php

                            if(!empty($all_product_order_data->entity_info_fields)){
                                foreach ($all_product_order_data->entity_info_fields as $entity_key=>$entity_data){
                                    if($entity_data->input != null && \App\EntityInfoField::where('id', $entity_key)->firstOrFail()){
                            @endphp

                                        @if(\App\EntityInfoField::where('id', $entity_key)->first()->field_type == 2)

                                            @foreach(\App\EntityInfoField::where('id', $entity_key)->first()->getOptions() as $value => $option)
                                                @if(!empty($entity_data) && $entity_data->input == $value)
                                                    {{$option}}
                                                @endif
                                             @endforeach
                                        @else
                                            {{ \App\EntityInfoField::where('id', $entity_key)->first()->getValue($entity_data)->input }}
                                        @endif
                            @php
                                    }
                                }
                            }
                            @endphp
                        </strong>
                    </td>
                    <td colspan="2" class="head-2" style="padding: 3px 30px 3px 0;vertical-align: bottom;padding-bottom: 15px;font-size: 25px;font-weight: bold;">
                        Turnaround time:
                    </td>
                </tr>
                </thead>
                <tbody>
                @if(!empty($all_product_order_data->prices->base))
                <tr class="first">
                    <td class="col-1" style="padding: 3px 30px 3px 0;border-bottom: 2px solid #f8b102;font-size: 21px;color: #f8b102;border-bottom-width: 3px;">
                        <strong>{{ $all_product_order_data->prices->base->name }}</strong>
                    </td>
                    <td class="col-2" style="padding: 3px 30px 3px 0;border-bottom: 2px solid #f8b102;font-size: 20px;color: #f8b102;border-bottom-width: 3px;">
                        ${{ $all_product_order_data->prices->base->price }}
                    </td>
                    <td class="col-3" style="padding: 3px 30px 3px 0;border-bottom: 2px solid #f8b102;font-size: 19px;border-bottom-width: 3px;">
                        @if(!empty($all_product_order_data->service_expediting))
                            {{\App\ServiceExpediting::where('id',$all_product_order_data->service_expediting)->first()->time}}
                        @else
                            {{ \App\Service::where('id',$main_Service_Id)->first()->getTurnaroundTime($main_State_Id) }}
                        @endif
                    </td>
                    <td class="col-4" style="padding: 3px 30px 3px 0;border-bottom: 2px solid #f8b102;font-size: 19px;color: #f8b102;border-bottom-width: 3px;">
                        @if(!empty($all_product_order_data->service_expediting))
                            ${{\App\ServiceExpediting::where('id',$all_product_order_data->service_expediting)->first()->price}}
                        @else
                            $0
                        @endif
                    </td>
                </tr>
                @endif
                @php
                $additional_prices_array_exist = [];
                @endphp

                @if(!empty($all_product_order_data->prices->additional_services))
                    @foreach($all_product_order_data->prices->additional_services as $key_additional_service=>$additional_service_price)
                        @php
                        $additional_service_exist_flag = true;
                        @endphp
                        <tr>
                            <td class="col-1" style="padding: 3px 30px 3px 0;border-bottom: 2px solid #f8b102;font-size: 21px;color: #f8b102;">
                                <img src="http://usacorpdev.itcraftlab.com/images/email-check-ico.png" style="margin-right: 10px;">
                                {{ $additional_service_price->name }}
                            </td>
                            <td class="col-2" style="padding: 3px 30px 3px 0;border-bottom: 2px solid #f8b102;font-size: 20px;color: #f8b102;">
                                @if(!empty($all_product_order_data->prices->additional_prices))
                                    @foreach($all_product_order_data->prices->additional_prices as $additional_prices)
                                        @if($additional_prices->name == $additional_service_price->name)
                                            ${{$additional_prices->price}}
                                            @php
                                                $additional_service_exist_flag = false;
                                            @endphp
                                        @endif
                                    @endforeach
                                @endif
                                @if($additional_service_exist_flag)
                                ${{ $additional_service_price->name == 'EIN' ? 0 : $additional_service_price->price }}
                                @endif
                            </td>
                            <td class="col-3" style="padding: 3px 30px 3px 0;border-bottom: 2px solid #f8b102;font-size: 19px;">
                                @if(!empty($all_product_order_data->prices->additional_service_expediting) && isset($all_product_order_data->prices->additional_service_expediting->{$key_additional_service}) )
                                    {{ \App\ServiceExpediting::where('service_id',$key_additional_service)->where('state_id',$main_State_Id)->where('price',$all_product_order_data->prices->additional_service_expediting->{$key_additional_service}->price)->first()->time }}
                                @else
                                    {{ \App\Service::where('id',$key_additional_service)->first()->getTurnaroundTimeAdditional($main_State_Id) }}
                                @endif
                            </td>
                            <td class="col-4" style="padding: 3px 30px 3px 0;border-bottom: 2px solid #f8b102;font-size: 19px;color: #f8b102;">
                                @if(!empty($all_product_order_data->prices->additional_service_expediting) && isset($all_product_order_data->prices->additional_service_expediting->{$key_additional_service}) )
                                    ${{$all_product_order_data->prices->additional_service_expediting->{$key_additional_service}->price}}
                                @else
                                    $0
                                @endif
                            </td>
                        </tr>
                        @php
                            $additional_prices_array_exist[] = $additional_service_price->name;
                        @endphp
                    @endforeach
                @endif
                @if(!empty($all_product_order_data->prices->additional_prices))
                    @foreach($all_product_order_data->prices->additional_prices as $additional_service_price)
                        @if(!in_array($additional_service_price->name,$additional_prices_array_exist))
                            <tr>
                                <td class="col-1" style="padding: 3px 30px 3px 0;border-bottom: 2px solid #f8b102;font-size: 21px;color: #f8b102;">
                                    <img src="http://usacorpdev.itcraftlab.com/images/email-check-ico.png" style="margin-right: 10px;">
                                    {{ $additional_service_price->name }}
                                </td>
                                <td class="col-2" style="padding: 3px 30px 3px 0;border-bottom: 2px solid #f8b102;font-size: 20px;color: #f8b102;">
                                    ${{ $additional_service_price->price }}
                                </td>
                                <td class="col-3" style="padding: 3px 30px 3px 0;border-bottom: 2px solid #f8b102;font-size: 19px;">

                                </td>
                                <td class="col-4" style="padding: 3px 30px 3px 0;border-bottom: 2px solid #f8b102;font-size: 19px;color: #f8b102;">

                                </td>
                            </tr>
                        @endif
                    @endforeach
                @endif

                </tbody>
                <tfoot>
                <tr>
                    <td style="padding: 3px 30px 3px 0;padding-top: 26px;">
                        <strong class="total" style="display: block;background: #f8b102;padding: 8px 10px;font-size: 22px;font-weight: bold;">
                            Total Payment: ${{$order->price}}
                        </strong>
                    </td>
                    <td colspan="3" class="method" style="padding: 3px 30px 3px 0;padding-top: 26px;font-size: 21px;line-height: 1;font-weight: bold;">
                        <strong style="font-weight: bold;display: block;">
                            Payment Method:
                        </strong>
                        <span class="mark" style="color: #f8b102;">
                            @php
                                if(!empty($all_product_order_data->{'payment-method'})){
                            @endphp
                                @php
                                    if(!empty($all_product_order_data->{'payment-method'})){
                                @endphp

                                        @if($all_product_order_data->{'payment-method'} == 'credit-card')
                                            Credit Card
                                        @elseif($all_product_order_data->{'payment-method'} == 'e-check')
                                            E-Check
                                        @elseif($all_product_order_data->{'payment-method'} == 'usa-acc')
                                            Bill my USACORP account
                                        @elseif($all_product_order_data->{'payment-method'} == 'paypal')
                                            PayPal
                                        @elseif($all_product_order_data->{'payment-method'} == 'upload-check')
                                            Upload copy of check
                                        @else
                                            QuickPay/Zelle
                                        @endif
                            @php
                                    }
                                }
                            @endphp
                            </span>
                    </td>
                </tr>
                </tfoot>
            </table>
        </div>

        @if(!empty($all_product_order_data->step_fifth_contact_info))
            <div class="contact-box" style="margin: 0 0 40px;padding: 12px 20px;border: 2px solid #f8b102;font-style: 18px;">
                <strong class="title" style="display: block;font-size: 21px;font-weight: bold;border-bottom: 2px solid #f8b102;margin: 0 0 5px;">Contact Info</strong>
                <p style="margin: 0;">
                @php
                if(!empty($all_product_order_data->step_fifth_contact_info->first_name)){
                @endphp
                    {{$all_product_order_data->step_fifth_contact_info->first_name}}
                @php
                }
                if(!empty($all_product_order_data->step_fifth_contact_info->last_name)){
                @endphp
                    {{$all_product_order_data->step_fifth_contact_info->last_name}}
                @php
                }
                @endphp
                <br>
                <span class="mark" style="color: #f8b102;">
                    Address:
                </span>
                    <br>
                @php
                if(!empty($all_product_order_data->step_fifth_contact_info->same_address)){
                    if(\App\Question::where('id',$all_product_order_data->step_fifth_contact_info->same_address)->first()){
                @endphp
                        <span class="mark" style="color: #f8b102;">
                            Same as:
                        </span>
                        {{ \App\Question::where('id',$all_product_order_data->step_fifth_contact_info->same_address)->first()->name }}
                        <br>
                @php
                    }
                }

                if(!empty($all_product_order_data->step_fifth_contact_info->address)){
                @endphp
                    {{$all_product_order_data->step_fifth_contact_info->address}}<br>
                @php
                }
                if(!empty($all_product_order_data->step_fifth_contact_info->address2)){
                @endphp
                    {{$all_product_order_data->step_fifth_contact_info->address2}}<br>
                @php
                }
                if(!empty($all_product_order_data->step_fifth_contact_info->city)){
                @endphp
                    {{$all_product_order_data->step_fifth_contact_info->city}}<br>
                @php
                }
                if(!empty($all_product_order_data->step_fifth_contact_info->state)){
                @endphp
                    {{ \App\State::where('id',$all_product_order_data->step_fifth_contact_info->state)->first()->abbreviation}}<br>
                @php
                }
                if(!empty($all_product_order_data->step_fifth_contact_info->zip)){
                @endphp
                    {{$all_product_order_data->step_fifth_contact_info->zip}}<br>
                @php
                }
                if(!empty($all_product_order_data->step_fifth_contact_info->phone)){
                @endphp
                    {{$all_product_order_data->step_fifth_contact_info->phone}}<br>
                @php
                }
                if(!empty($all_product_order_data->step_fifth_contact_info->phone_type)){
                @endphp
                    {{$all_product_order_data->step_fifth_contact_info->phone_type}}<br>
                @php
                }
                if(!empty($all_product_order_data->step_fifth_contact_info->representative)){
                @endphp
                    {{$all_product_order_data->step_fifth_contact_info->representative}}<br>
                @php
                }
                if(!empty($all_product_order_data->step_fifth_contact_info->email)){
                @endphp
                    {{$all_product_order_data->step_fifth_contact_info->email}}<br>
                @php
                }
                if(!empty($all_product_order_data->step_fifth_contact_info->fax)){
                @endphp
                    {{$all_product_order_data->step_fifth_contact_info->fax}}<br>
                @php
                }
                @endphp
                </p>
            </div>
        @endif

        @if(!empty($all_product_order_data->question))
            <div class="service-q" style="margin: 0 0 40px;font-size: 19px;">
                <strong class="title" style="margin: 0 0 18px;display: block;font-size: 23px;font-weight: bold;border-bottom: 4px solid #f8b102;">
                    Service Questions
                </strong>
                <div class="holder" style="overflow: hidden;">
                @php
                    $count_questions = count((array)$all_product_order_data->question);
                    $iter = 0;
                @endphp
                    <div class="col-1" style="width: 320px;float: left;">
                        @php
                        foreach ($all_product_order_data->question as $key=>$question){
                            $iter++;
                            if($iter > (int)($count_questions / 2) ){
                                break;
                            }
                        @endphp
                        <div class="item" style="border-bottom: 2px solid #c1c1c1;padding: 0 0 10px;margin: 0 0 10px;">
                            <strong style="display: block;font-weight: normal;color: #f8b102;">
                                {{ \App\Question::where('id', $key)->first()->name }}:
                            </strong>
                            <span>
                    @php
                            foreach ($question as $key_item=>$question_item){
                                foreach ($question_item as $key_field=>$item_field) {
                                    if(\App\FieldOption::where('id', $key_field)->first()){
                    @endphp
                                        @if(\App\FieldOption::where('id', $key_field)->first()->type == 10)
                                            <a class="form-control"
                                               href="https://usacorpinc.com/file_storage/{{ \App\FieldOption::where('id', $key_field)->first()->getValueAdmin($item_field) }}"
                                               download>Download file</a>
                                        @elseif(\App\FieldOption::where('id', $key_field)->first()->type == 30)
                                            {{ $item_field->name }} <br>
                                            {{ $item_field->cardnumber }}<br>
                                            {{ $item_field->date }}<br>
                                            {{ $item_field->year }}<br>
                                            {{ $item_field->cvv }}<br>

                                        @else
                                            @php
                                                try{
                                                    echo \App\FieldOption::where('id', $key_field)->first()->getValueAdmin($item_field);
                                                 } catch (\Exception $e) {
                                                 print_r($item_field);
                                                 echo \App\FieldOption::where('id', $key_field)->first()->type;
                                                 }
                                            @endphp
                                        @endif
                    @php
                                    }
                                }
                            }
                    @endphp
                        </span>
                    </div>
                    @php
                        }
                    @endphp
                    </div>
                    <div class="col-2" style="width: 320px;float: right;">
                    @php
                        $iter2 = 0;
                        foreach ($all_product_order_data->question as $key=>$question){
                            $iter2++;
                            if($iter2 >= $iter ){
                    @endphp
                        <div class="item" style="border-bottom: 2px solid #c1c1c1;padding: 0 0 10px;margin: 0 0 10px;">
                            <strong style="display: block;font-weight: normal;color: #f8b102;">
                                {{ \App\Question::where('id', $key)->first()->name }}:
                            </strong>
                            <span>
                    @php
                                foreach ($question as $key_item=>$question_item){
                                    foreach ($question_item as $key_field=>$item_field) {
                                        if(\App\FieldOption::where('id', $key_field)->first()){
                    @endphp
                                            @if(\App\FieldOption::where('id', $key_field)->first()->type == 10)
                                                <a class="form-control"
                                                   href="https://usacorpinc.com/file_storage/{{ \App\FieldOption::where('id', $key_field)->first()->getValueAdmin($item_field) }}"
                                                   download>Download file</a>
                                            @elseif(\App\FieldOption::where('id', $key_field)->first()->type == 30)
                                                {{ $item_field->name }} <br>
                                                {{ $item_field->cardnumber }}<br>
                                                {{ $item_field->date }}<br>
                                                {{ $item_field->year }}<br>
                                                {{ $item_field->cvv }}<br>

                                            @else
                                                @php
                                                    try{
                                                        echo \App\FieldOption::where('id', $key_field)->first()->getValueAdmin($item_field);
                                                     } catch (\Exception $e) {
                                                     print_r($item_field);
                                                     echo \App\FieldOption::where('id', $key_field)->first()->type;
                                                     }
                                                @endphp
                                            @endif
                                @php
                                        }
                                    }
                                }
                                @endphp
                            </span>
                        </div>
                        @php
                            }
                        }
                        @endphp
                    </div>
                </div>
            </div>
        @endif

        @if(!empty($all_product_order_data->additional_questions))
            <div class="service-q" style="margin: 0 0 40px;font-size: 19px;">
                <strong class="title" style="margin: 0 0 18px;display: block;font-size: 23px;font-weight: bold;border-bottom: 4px solid #f8b102;">
                    Add-ON Questions
                </strong>
                <div class="holder" style="overflow: hidden;">
            @php
                $key_addtional_service_iter = 1;
                $additional_services_array = [];
            @endphp
                @foreach ($all_product_order_data->additional_questions as $key_additional_questions=>$additional_questions)
                    {{--@if(!in_array($key_additional_questions,$additional_services_array))--}}
                    @if(1)
                    <div class="col-{{$key_addtional_service_iter}}" style="width: 320px;float: {{ $key_addtional_service_iter == 1 ? 'left' : 'right' }};">
                    @php
                        //$additional_services_array[] = $key_additional_services;
                        if($key_addtional_service_iter == 1){
                            $key_addtional_service_iter = 2;
                        }else{
                            $key_addtional_service_iter = 1;
                        }
                    @endphp
                        @if(\App\Service::where('id', $key_additional_questions)->first())
                        <div class="sub-title" style="display: block;font-weight: bold;font-size: 24px;margin: 0 0 10px;">
                            {{ \App\Service::where('id', $key_additional_questions)->first()->name }}
                        </div>
                        @endif
                        @php
                        foreach ($additional_questions as $key=>$question){
                            if(\App\Question::where('id', $key)->first()){

                            }
                            else{
                                break;
                            }
                        @endphp
                        <div class="item" style="border-bottom: 2px solid #c1c1c1;padding: 0 0 10px;margin: 0 0 10px;">
                            <strong style="display: block;font-weight: normal;color: #f8b102;">
                                {{ \App\Question::where('id', $key)->first()->name }}</h4>
                            </strong>
                            <span>
            @php
                            foreach ($question as $key_item=>$question_item){
                                foreach ($question_item as $key_field=>$item_field) {
                                    if(\App\FieldOption::where('id', $key_field)->first()){
            @endphp
                                        @if($item_field)
                                            @if(\App\FieldOption::where('id', $key_field)->first()->type == 10)
                                                <a class="form-control"
                                                   href="https://usacorpinc.com/file_storage/{{ \App\FieldOption::where('id', $key_field)->first()->getValueAdmin($item_field) }}"
                                                   download>Download file</a>
                                            @elseif(\App\FieldOption::where('id', $key_field)->first()->type == 30)
                                                Name: {{ $item_field->name }} <br>
                                                Card Number : {{ $item_field->cardnumber }}<br>
                                                Month: {{ $item_field->date }}<br>
                                                Year: {{ $item_field->year }}<br>
                                                CVV: {{ $item_field->cvv }}<br>
                                                {{--{{ print_r($item_field) }}--}}
                                            @else
                                                @php
                                                    try{
                                                        echo \App\FieldOption::where('id', $key_field)->first()->getValueAdmin($item_field) . '<br>';
                                                     } catch (\Exception $e) {
                                                     print_r($item_field);
                                                     echo \App\FieldOption::where('id', $key_field)->first()->type;
                                                     }
                                                @endphp
                                            @endif
                                        @endif
            @php
                                    }
                                }
                            }
            @endphp
                            </span>
                        </div>
            @php
                        }
            @endphp
                    </div>
                        @endif
                    @endforeach
                </div>

            </div>
        @endif

        @if(!empty($all_product_order_data->billing_info))
            <div class="service-q" style="margin: 0 0 40px;font-size: 19px;">
                <strong class="title" style="margin: 0 0 18px;display: block;font-size: 23px;font-weight: bold;border-bottom: 4px solid #f8b102;">
                    Billing Info:
                </strong>
                <p class="info" style="font-size: 16px;margin: 0 0 24px;">
                    @php
                    if(!empty($all_product_order_data->billing_info->address)){
                    @endphp
                        {{$all_product_order_data->billing_info->address}} <br>
                    @php
                    }
                    if(!empty($all_product_order_data->billing_info->address2)){
                    @endphp
                        {{$all_product_order_data->billing_info->address2}} <br>
                    @php
                    }
                    if(!empty($all_product_order_data->billing_info->city)){
                    @endphp
                        {{$all_product_order_data->billing_info->city}} <br>
                    @php
                    }
                    if(!empty($all_product_order_data->billing_info->state)){
                    @endphp
                        {{ \App\State::where('id',$all_product_order_data->billing_info->state)->first()->abbreviation}} <br>
                    @php
                    }
                    if(!empty($all_product_order_data->billing_info->zip)){
                    @endphp
                        {{$all_product_order_data->billing_info->zip}} <br>
                    @php
                    }

                    if(!empty($all_product_order_data->{'payment-method'})){
                        if(!empty($all_product_order_data->{'payment-method'})){
                    @endphp
                            @if($all_product_order_data->{'payment-method'} == 'credit-card')
                                Credit Card<br>
                            @elseif($all_product_order_data->{'payment-method'} == 'e-check')
                                E-Check<br>
                            @elseif($all_product_order_data->{'payment-method'} == 'usa-acc')
                                Bill my USACORP account<br>
                            @elseif($all_product_order_data->{'payment-method'} == 'paypal')
                                PayPal<br>
                            @elseif($all_product_order_data->{'payment-method'} == 'upload-check')
                                Upload copy of check<br>
                            @else
                                QuickPay/Zelle<br>
                            @endif
                    @php
                        }
                        $payment_method = $all_product_order_data->{'payment-method'};
                        if($payment_method == 'e-check'){
                            if(!empty($all_product_order_data->{$payment_method}->check)){
                    @endphp
                                <a href="https://usacorpinc.com{{\Illuminate\Support\Facades\Storage::url($all_product_order_data->{$payment_method}->check)}}"
                                   download="">Download</a><br>
                    @php
                            }
                            if(!empty($all_product_order_data->{$payment_method}->number)){
                    @endphp
                                {{ $all_product_order_data->{$payment_method}->number }} <br> <br>
                    @php
                            }
                            if(!empty($all_product_order_data->{$payment_method}->account)){
                    @endphp
                                {{ $all_product_order_data->{$payment_method}->account }} <br>
                    @php
                            }
                            if(!empty($all_product_order_data->{$payment_method}->name)){
                    @endphp
                                {{ $all_product_order_data->{$payment_method}->name }} <br>
                    @php
                            }
                            if(!empty($all_product_order_data->{$payment_method}->cardnumber)){
                    @endphp
                                {{   $all_product_order_data->{$payment_method}->cardnumber }} <br>
                    @php
                            }
                            if(!empty($all_product_order_data->{$payment_method}->date)){
                    @endphp
                                {{$all_product_order_data->{$payment_method}->date}} <br>
                    @php
                            }
                            if(!empty($all_product_order_data->{$payment_method}->year)){
                    @endphp
                                {{$all_product_order_data->{$payment_method}->year}} <br>
                    @php
                            }
                            if(!empty($all_product_order_data->{$payment_method}->cvv)){
                    @endphp
                                {{$all_product_order_data->{$payment_method}->cvv}} <br>
                    @php
                            }
                            if(!empty($all_product_order_data->{$payment_method}->name2)){
                    @endphp
                                {{$all_product_order_data->{$payment_method}->name2}} <br>
                    @php
                            }
                            if(!empty($all_product_order_data->{$payment_method}->order_id)){
                    @endphp
                                {{$all_product_order_data->{$payment_method}->order_id}} <br>
                    @php
                            }
                            if(!empty($all_product_order_data->{'usa-acc'}->number)){
                    @endphp
                                {{$all_product_order_data->{$payment_method}->number}} <br>
                    @php
                            }
                        }
                        else{
                            if(!empty($all_product_order_data->{$payment_method}->check)){
                    @endphp
                                <a href="https://usacorpinc.com{{\Illuminate\Support\Facades\Storage::url($all_product_order_data->{$payment_method}->check)}}"
                                   download="">Download</a>
                    @php
                            }
                            if(!empty($all_product_order_data->{$payment_method}->name)){
                    @endphp
                                {{ $all_product_order_data->{$payment_method}->name }} <br>
                    @php
                            }
                            if(!empty($all_product_order_data->{$payment_method}->number)){
                    @endphp
                                {{ $all_product_order_data->{$payment_method}->number }} <br>
                    @php
                            }
                            if(!empty($all_product_order_data->{$payment_method}->date)){
                    @endphp
                                {{$all_product_order_data->{$payment_method}->date}} <br>
                    @php
                            }
                            if(!empty($all_product_order_data->{$payment_method}->year)){
                    @endphp
                                {{$all_product_order_data->{$payment_method}->year}} <br>
                    @php
                            }
                            if(!empty($all_product_order_data->{$payment_method}->cvv)){
                    @endphp
                                {{$all_product_order_data->{$payment_method}->cvv}} <br>
                    @php
                            }
                            if(!empty($all_product_order_data->{$payment_method}->account)){
                    @endphp
                                {{ $all_product_order_data->{$payment_method}->account }} <br>
                    @php
                            }
                            if(!empty($all_product_order_data->{$payment_method}->name2)){
                    @endphp
                                {{$all_product_order_data->{$payment_method}->name2}} <br>
                    @php
                            }
                            if(!empty($all_product_order_data->{$payment_method}->cardnumber)){
                    @endphp
                                {{ $all_product_order_data->{$payment_method}->cardnumber }} <br>
                    @php
                            }
                            if(!empty($all_product_order_data->{$payment_method}->order_id)){
                    @endphp
                                {{$all_product_order_data->{$payment_method}->order_id}} <br>
                    @php
                            }
                            if(!empty($all_product_order_data->{'usa-acc'}->number)){
                    @endphp
                                {{$all_product_order_data->{$payment_method}->number}} <br>
                    @php
                            }
                        }
                    }
                    @endphp
                </p>
                <span class="ip" style="display: inline-block;font-size: 19px;border-top: 4px solid #f8b102;padding: 8px 0 0;">
                    <strong>
                        IP address:
                    </strong>
                        {{ str_replace('.','-',$order->order->ip_address) }}
                </span>
            </div>
        @endif
    </div>
@endif