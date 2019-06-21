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
    <table border="0" cellpadding="0" cellspacing="0" width="100%"
           style="color: #000; font-family: Arial; font-size: 20px; line-height: 24px;">
        <tbody>
        <tr>
            <td align="center">
                <table border="0" cellpadding="0" cellspacing="0" width="800">
                    <tbody>
                    <tr>
                        <td height="60"></td>
                    </tr>
                    <tr>
                        <td>
                            <span style="font-size: 30px; line-height: 34px; font-family: Arial;">
                                @if(isset($additional_order_id) && !empty($additional_order_id))
                                <b>Order</b> #{{$additional_order_id}}
                                @endif
                                Summary:</span>
                        </td>
                    </tr>
                    <tr>
                        <td height="20"></td>
                    </tr>
                    <tr>
                        <td>
                            <table border="2" bordercolor="#f8b102" cellpadding="0" cellspacing="0" width="800"
                                   style="border: 2px solid #f8b102">
                                <tbody>
                                <tr>
                                    <td style="padding:20px;">
                                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                            <tbody>
                                            <tr>
                                                <td>
                                                    <table border="0" cellpadding="0" cellspacing="0">
                                                        <tbody>
                                                        <tr>
                                                            <td bgcolor="#f8b102" style="padding: 0 10px;">
                                                                <span style="font-size: 18px; line-height: 24px;">{{ \App\Service::where('id',$main_Service_Id)->first()->new_entity ? 'New' : 'Existing' }}</span>
                                                            </td>
                                                            <td style="padding: 0 10px 0 16px;">
                                                                <span style="font-size: 18px; line-height: 24px;"><b>{{$state_name}}</b></span>
                                                            </td>
                                                            <td width="2" height="35" bgcolor="#f8b102"></td>
                                                            <td style="padding: 0 10px;">
                                                                <span style="font-size: 18px; line-height: 24px;"><b>{{$service_name}} </b></span>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" height="10"></td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" height="3" bgcolor="#f8b102"></td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" height="10"></td>
                                            </tr>
                                            @php
                                            $entity_main_name = '';
                                            $alternate_entity_name = '';
                                            @endphp
                                            <tr>
                                                <td valign="bottom" colspan="2">
                                                                    <span style="font-size: 20px;"><b><span
                                                                                    style="color: #f8b102;">Entity:</span>
                                                                        @php
                                                                            if(!empty($all_product_order_data->entity_info_fields)){
                                                                                foreach ($all_product_order_data->entity_info_fields as $entity_key=>$entity_data){
                                                                                    if($entity_data->input != null && \App\EntityInfoField::where('id', $entity_key)->firstOrFail()){
                                                                        @endphp

                                                                        @if(\App\EntityInfoField::where('id', $entity_key)->first()->field_type == 2)

                                                                            @foreach(\App\EntityInfoField::where('id', $entity_key)->first()->getOptions() as $value => $option)
                                                                                @if(!empty($entity_data) && $entity_data->input == $value)
                                                                                    {{$option}}
                                                                                    @php
                                                                                        $entity_main_name .= $option;
                                                                                    @endphp
                                                                                @endif
                                                                            @endforeach
                                                                        @else

                                                                                @if(\App\EntityInfoField::where('id', $entity_key)->first()->entity_info_type == 3)
                                                                                    @php
                                                                                        $alternate_entity_name = \App\EntityInfoField::where('id', $entity_key)->first()->getValue($entity_data)->input;
                                                                                    @endphp
                                                                                    @else
                                                                            {{ \App\EntityInfoField::where('id', $entity_key)->first()->getValue($entity_data)->input }}
                                                                            @php
                                                                                $entity_main_name .= \App\EntityInfoField::where('id', $entity_key)->first()->getValue($entity_data)->input;
                                                                            @endphp
                                                                                    @endif
                                                                        @endif
                                                                        @php
                                                                            }
                                                                        }
                                                                    }
                                                                        @endphp</span>
                                                </td>
                                                <td valign="bottom" colspan="2">
                                                    <span style="font-size: 24px;"><b>Turnaround time:</b></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" height="20">
                                                    @if(isset($all_product_order_data->prices->base->name) && $all_product_order_data->prices->base->name != 'DBA' && !empty($alternate_entity_name))
                                                        <b>alternate: {{ $alternate_entity_name }}</b>
                                                    @endif
                                                </td>
                                            </tr>
                                            @php
                                                $totla_price_sum = 0;
                                            @endphp
                                            @if(!empty($all_product_order_data->prices->base))
                                                <tr style="font-size: 20px;">
                                                    <td style="padding:6px 6px 6px 0; color: #f8b102;">
                                                        <span style="font-size: 20px; line-height: 24px;"><b>
                                                                {{ isset($all_product_order_data->prices->base->name) ? $all_product_order_data->prices->base->name : '' }}
                                                                <span style="color: black;">
                                                                {{ isset($all_product_order_data->prices->base->name) && $all_product_order_data->prices->base->name == 'DBA' ? $alternate_entity_name : ''  }}
                                                                </span>
                                                            </b></span>
                                                    </td>
                                                    <td style="padding:6px 6px 6px 20px; color: #f8b102;">
                                                        <span style="font-size: 20px; line-height: 24px;"><b>${{ $all_product_order_data->prices->base->price == 'undefined' ? 0 : $all_product_order_data->prices->base->price }}</b>
                                                        </span>
                                                    </td>
                                                    @php
                                                        $totla_price_sum+= $all_product_order_data->prices->base->price == 'undefined' ? 0 : $all_product_order_data->prices->base->price;
                                                    @endphp
                                                    <td style="padding:6px;"> @if(!empty($all_product_order_data->service_expediting))
                                                            <span style="font-size: 20px; line-height: 24px;">
                                                            {{\App\ServiceExpediting::where('id',$all_product_order_data->service_expediting)->first()->time}}
                                                                @else
                                                                    {{ \App\Service::where('id',$main_Service_Id)->first()->getTurnaroundTime($main_State_Id) }}
                                                                @endif
                                                            </span>
                                                    </td>
                                                    <td style="padding:6 0 6px 6px; color: #f8b102;"><span
                                                                style="font-size: 20px; line-height: 24px;"><b>@if(!empty($all_product_order_data->service_expediting))

                                                                    ${{\App\ServiceExpediting::where('id',$all_product_order_data->service_expediting)->first()->price}}
                                                                    @php
                                                                        $totla_price_sum+=(int)\App\ServiceExpediting::where('id',$all_product_order_data->service_expediting)->first()->price;
                                                                    @endphp
                                                                @else
                                                                    $0
                                                                @endif</b></span></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4" height="3" bgcolor="#f8b102"></td>
                                                </tr>
                                            @endif
                                            @php
                                                $additional_prices_array_exist = [];
                                            @endphp

                                            @if(!empty($all_product_order_data->prices->service_type))
                                                <tr style="font-size: 20px;">
                                                    <td class="col-1"
                                                        style="padding:6px 6px 6px 0; color: #f8b102;">
                                                        <span style="font-size: 20px; line-height: 24px;">

                                                            Type
                                                            @php
                                                            if(isset($all_product_order_data->prices->service_type->name)){
                                                                echo html_entity_decode(htmlentities($all_product_order_data->prices->service_type->name));
                                                            }
                                                            @endphp
                                                        </span>
                                                    </td>
                                                    <td class="col-2"
                                                        style="padding:6px 6px 6px 20px; color: #f8b102;">

                                                    </td>
                                                    <td class="col-3" style="padding:6px;">

                                                    </td>
                                                    <td class="col-4"
                                                        style="padding:6 0 6px 6px; color: #f8b102;">

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4" height="2" bgcolor="#f8b102"></td>
                                                </tr>
                                            @endif

                                            @if(!empty($all_product_order_data->prices->additional_services))
                                                @foreach($all_product_order_data->prices->additional_services as $key_additional_service=>$additional_service_price)
                                                    @php
                                                        $additional_service_exist_flag = true;
                                                    @endphp
                                                    <tr style="font-size: 20px;">
                                                        <td class="col-1"
                                                            style="padding:6px 6px 6px 0; color: #f8b102;">
                                                            <span style="font-size: 20px; line-height: 24px;">

                                                                {{ isset($additional_service_price->name) ?  $additional_service_price->name : '' }}
                                                            </span>
                                                        </td>
                                                        <td class="col-2"
                                                            style="padding:6px 6px 6px 20px; color: #f8b102;">
                                                            <span style="font-size: 20px; line-height: 24px;">
                                                            <b>
                                                                @if(!empty($all_product_order_data->prices->additional_prices))
                                                                    @foreach($all_product_order_data->prices->additional_prices as $additional_prices)
                                                                        @if(isset($additional_prices->name) && isset($additional_service_price->name) && $additional_prices->name == $additional_service_price->name)
                                                                            @php
                                                                                $totla_price_sum+=(int)$additional_prices->price;
                                                                            @endphp
                                                                            ${{$additional_prices->price}}
                                                                            @php
                                                                                $additional_service_exist_flag = false;
                                                                            @endphp
                                                                        @endif
                                                                    @endforeach
                                                                @endif
                                                                @if($additional_service_exist_flag)
                                                                    ${{ isset($additional_service_price->name) && $additional_service_price->name == 'EIN' ? 0 : $additional_service_price->price }}
                                                                    @php
                                                                        $totla_price_sum+= isset($additional_service_price->name) && $additional_service_price->name == 'EIN' ? 0 : (int)$additional_service_price->price;
                                                                    @endphp
                                                                @endif
                                                            </b>
                                                            </span>
                                                        </td>
                                                        <td class="col-3" style="padding:6px;">
                                                            <span style="font-size: 20px; line-height: 24px;">
                                                            @if(!empty($all_product_order_data->prices->additional_service_expediting) && isset($all_product_order_data->prices->additional_service_expediting->{$key_additional_service}) )
                                                                    {{ \App\ServiceExpediting::where('service_id',$key_additional_service)->where('state_id',$main_State_Id)->where('price',$all_product_order_data->prices->additional_service_expediting->{$key_additional_service}->price)->first()->time }}
                                                                @else
                                                                    {{ \App\Service::where('id',$key_additional_service)->first()->getTurnaroundTimeAdditional($main_State_Id) }}
                                                                @endif
                                                            </span>
                                                        </td>
                                                        <td class="col-4" style="padding:6 0 6px 6px; color: #f8b102;">
                                                            <span style="font-size: 20px; line-height: 24px;">
                                                            <b>
                                                                @if(!empty($all_product_order_data->prices->additional_service_expediting) && isset($all_product_order_data->prices->additional_service_expediting->{$key_additional_service}) )
                                                                    ${{$all_product_order_data->prices->additional_service_expediting->{$key_additional_service}->price}}
                                                                    @php
                                                                        $totla_price_sum+=(int)$all_product_order_data->prices->additional_service_expediting->{$key_additional_service}->price;
                                                                    @endphp
                                                                @else
                                                                    $0
                                                                @endif
                                                            </b>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="4" height="2" bgcolor="#f8b102"></td>
                                                    </tr>
                                                    @php
                                                        $additional_prices_array_exist[] = isset($additional_service_price->name) ? $additional_service_price->name : '';
                                                    @endphp
                                                    @if(isset($additional_service_price->name) && ($additional_service_price->name == 'LLC Publishing' || $additional_service_price->name == 'NY LLC Publishing') )
                                                        <tr style="font-size: 20px;">
                                                            <td class="col-1"
                                                                style="padding:6px 6px 6px 0; color: #f8b102;">
                                                            <span style="font-size: 20px; line-height: 24px;">
                                                                County
                                                            </span>
                                                            </td>
                                                            <td class="col-2"
                                                                style="padding:6px 6px 6px 20px; color: #f8b102;">
                                                            <span style="font-size: 20px; line-height: 24px;">
                                                                <b>
                                                                    @php
                                                                        if(isset($all_product_order_data->question)){
                                                                            $additonal_service_type_questions = \App\AdditionalServiceTypeQuestion::where('state_id', $main_State_Id)->where('main_service_id',$main_Service_Id)->where('child_service_id',62)->get();
                                                                            $exit_flag = false;
                                                                            if(count($additonal_service_type_questions)){
                                                                                foreach ($additonal_service_type_questions as $additonal_service_type_question) {
                                                                                    if(key_exists($additonal_service_type_question->main_question_id,(array)$all_product_order_data->question)){
                                                                                        foreach ($all_product_order_data->question->{$additonal_service_type_question->main_question_id} as $key => $item){
                                                                                            $additional_question_for_type = \App\Question::where('id',$additonal_service_type_question->addon_question_id)->with(['fieldOptions'])->first();
                                                                                            foreach ($item as $field_key=>$field_value){
                                                                                            $main_value = \App\FieldOption::where('id',$field_key)->first()->getValue($field_value);
                                                                                            echo $main_value;
                                                                                            }
                                                                                        }
                                                                                    }
                                                                                }
                                                                            }
                                                                        }
                                                                    @endphp
                                                                </b>
                                                            </span>
                                                            </td>
                                                            <td class="col-3" style="padding:6px;">
                                                            <span style="font-size: 20px; line-height: 24px;">
                                                        </span>
                                                            </td>
                                                            <td class="col-4" style="padding:6 0 6px 6px; color: #f8b102;">
                                                            <span style="font-size: 20px; line-height: 24px;">
                                                        </span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="4" height="2" bgcolor="#f8b102"></td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            @endif
                                            @if(!empty($all_product_order_data->prices->additional_prices))
                                                @php
                                                $additional_iter_prices = 0;
                                                @endphp
                                                @foreach($all_product_order_data->prices->additional_prices as $additional_service_price)
                                                    @if(isset($additional_service_price->name) && !in_array($additional_service_price->name,$additional_prices_array_exist))
                                                        <tr style="font-size: 20px;">
                                                            <td class="col-1"
                                                                style="padding:6px 6px 6px 0; color: #f8b102;">
                                                                <span style="font-size: 20px; line-height: 24px;">
                                                                    @php
                                                                        echo html_entity_decode(htmlentities($additional_service_price->name));
                                                                    @endphp
                                                                </span>
                                                                @if( $main_Service_Id == 62 )
                                                                    <p style="padding: 0; margin: 0; color: #000;">
                                                                    @php
                                                                        if($additional_iter_prices == 0){
                                                                            if(isset($all_product_order_data->service_service_type) && !empty($all_product_order_data->service_service_type) && $all_product_order_data->service_service_type != 400){
                                                                                if(\App\ServiceServiceType::where('id',$all_product_order_data->service_service_type)->first()->service_type_alter_name){
                                                                                    echo \App\ServiceServiceType::where('id',$all_product_order_data->service_service_type)->first()->service_type_alter_name;
                                                                                }else{
                                                                                    echo \App\ServiceType::where('id',\App\ServiceServiceType::where('id',$all_product_order_data->service_service_type)->first()->service_type_id)->first()->name;
                                                                                }
                                                                            }
                                                                        }elseif(isset($all_product_order_data->additional_service_type_main) && !empty($all_product_order_data->additional_service_type_main)  && $all_product_order_data->additional_service_type_main->{$additional_iter_prices} != 400){
                                                                            if(\App\ServiceServiceType::where('id',$all_product_order_data->additional_service_type_main->{$additional_iter_prices})->first()->service_type_alter_name){
                                                                                echo \App\ServiceServiceType::where('id',$all_product_order_data->additional_service_type_main->{$additional_iter_prices})->first()->service_type_alter_name;
                                                                            }else{
                                                                                echo \App\ServiceType::where('id',\App\ServiceServiceType::where('id',$all_product_order_data->additional_service_type_main->{$additional_iter_prices})->first()->service_type_id)->first()->name;
                                                                            }
                                                                        }
                                                                    @endphp
                                                                    </p>
                                                                @endif
                                                            </td>
                                                            <td class="col-2"
                                                                style="padding:6px 6px 6px 20px; color: #f8b102;">
                                                                <span style="font-size: 20px; line-height: 24px;">
                                                                <b>${{ $additional_service_price->price }}</b>
                                                                    @php
                                                                        $totla_price_sum+=(int)$additional_service_price->price;
                                                                    @endphp
                                                                </span>
                                                            </td>
                                                            <td class="col-3" style="padding:6px;">
                                                                @if($main_Service_Id == 62 && !empty($all_product_order_data->county_promo_code))
                                                                    <p style="font-size: 16px;color: red">
                                                                    Promo Code : {{ $all_product_order_data->county_promo_code }}<br>
                                                                        @php
                                                                            $discounted = $additional_service_price->price - $all_product_order_data->original_prices[$additional_iter_prices] ;

                                                                        @endphp
                                                                    Discounted: {{ $discounted }}$
                                                                    </p>
                                                                @endif
                                                            </td>
                                                            <td class="col-4"
                                                                style="padding:6 0 6px 6px; color: #f8b102;">

                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="4" height="2" bgcolor="#f8b102"></td>
                                                        </tr>
                                                    @endif
                                                    @php
                                                        $additional_iter_prices++;
                                                    @endphp
                                                @endforeach
                                            @endif
                                            <tr>
                                                <td colspan="4" height="30"></td>
                                            </tr>
                                            <tr>
                                                <td bgcolor="#f8b102" style="padding:10px 16px;"><span
                                                            style="font-size: 20px;"><b>Total Payment: ${{$totla_price_sum}}</b></span>
                                                </td>
                                                <td colspan="3" style="padding: 0 0 0 20px;">
                                                                    <span style="font-size: 20px; line-height: 20px;"><b>Payment Method:</b><br/><b
                                                                                style="color: #f8b102;">
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
                                                                    </b></span>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td height="20"></td>
                    </tr>
                    @if(!empty($all_product_order_data->step_fifth_contact_info))
                        <tr>
                            <td>
                                <table border="2" bordercolor="#f8b102" cellpadding="0" cellspacing="0" width="800"
                                       style="border: 2px solid #f8b102">
                                    <tbody>
                                    <tr>
                                        <td style="padding:20px;">
                                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                <tbody>
                                                <tr>
                                                    <td style="font-size: 22px; padding-bottom: 5px;"><b>Contact
                                                            Info</b></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4" height="2" bgcolor="#f8b102"></td>
                                                </tr>
                                                <tr>
                                                    <td style="padding-top: 5px;">
                                                        <span style="font-size: 18px; line-height: 26px;">
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
                                                            {{$all_product_order_data->step_fifth_contact_info->address}}
                                                            <br>
                                                            @php
                                                                }
                                                                if(!empty($all_product_order_data->step_fifth_contact_info->address2)){
                                                            @endphp
                                                            {{$all_product_order_data->step_fifth_contact_info->address2}}
                                                            <br>
                                                            @php
                                                                }
                                                                if(!empty($all_product_order_data->step_fifth_contact_info->city)){
                                                            @endphp
                                                            {{$all_product_order_data->step_fifth_contact_info->city}}
                                                            <br>
                                                            @php
                                                                }
                                                                if(!empty($all_product_order_data->step_fifth_contact_info->state)){
                                                            @endphp
                                                            {{ \App\State::where('id',$all_product_order_data->step_fifth_contact_info->state)->first()->abbreviation}}
                                                            <br>
                                                            @php
                                                                }
                                                                if(!empty($all_product_order_data->step_fifth_contact_info->zip)){
                                                            @endphp
                                                            {{$all_product_order_data->step_fifth_contact_info->zip}}
                                                            <br>
                                                            @php
                                                                }
                                                                if(!empty($all_product_order_data->step_fifth_contact_info->phone)){
                                                            @endphp
                                                            {{$all_product_order_data->step_fifth_contact_info->phone}}
                                                            <br>
                                                            @php
                                                                }
                                                                if(!empty($all_product_order_data->step_fifth_contact_info->phone_type)){
                                                            @endphp
                                                            {{$all_product_order_data->step_fifth_contact_info->phone_type}}
                                                            <br>
                                                            @php
                                                                }
                                                                if(!empty($all_product_order_data->step_fifth_contact_info->representative)){
                                                            @endphp
                                                            {{$all_product_order_data->step_fifth_contact_info->representative}}
                                                            <br>
                                                            @php
                                                                }
                                                                if(!empty($all_product_order_data->step_fifth_contact_info->email)){
                                                            @endphp
                                                            {{$all_product_order_data->step_fifth_contact_info->email}}
                                                            <br>
                                                            @php
                                                                }
                                                                if(!empty($all_product_order_data->step_fifth_contact_info->fax)){
                                                            @endphp
                                                            {{$all_product_order_data->step_fifth_contact_info->fax}}
                                                            <br>
                                                            @php
                                                                }
                                                            @endphp
                                                        </span>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td height="40"></td>
                        </tr>
                    @elseif(!empty($all_product_order_data->contact_info))
                        <tr>
                            <td>
                                <table border="2" bordercolor="#f8b102" cellpadding="0" cellspacing="0" width="800"
                                       style="border: 2px solid #f8b102">
                                    <tbody>
                                    <tr>
                                        <td style="padding:20px;">
                                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                <tbody>
                                                <tr>
                                                    <td style="font-size: 22px; padding-bottom: 5px;"><b>Contact
                                                            Info</b></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4" height="2" bgcolor="#f8b102"></td>
                                                </tr>
                                                <tr>
                                                    <td style="padding-top: 5px;">
                                                    <span style="font-size: 18px; line-height: 26px;">
                    @php
                        if(isset($all_product_order_data->contact_info->name) && !empty($all_product_order_data->contact_info->name)){
                    @endphp
                                                        {{$all_product_order_data->contact_info->name}}<br>
                                                        @php

                                                            }
                                                            if(!empty($all_product_order_data->contact_info->phone)){
                                                        @endphp
                                                        {{$all_product_order_data->contact_info->phone}}<br>
                                                        @php
                                                            }
                                                            if(!empty($all_product_order_data->contact_info->email)){
                                                        @endphp
                                                        {{$all_product_order_data->contact_info->email}} <br>
                                                        @php
                                                            }
                                                        @endphp
                                </span>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>

                        <tr>
                            <td height="40"></td>
                        </tr>
                    @endif
                    @if(!empty($all_product_order_data->question))
                        <tr>
                            <td style="padding-bottom: 5px;">
                                <span style="font-size: 23px;"><b>Service Questions</b></span>
                            </td>
                        </tr>
                        <tr>
                            <td height="3" bgcolor="#f6ba04"></td>
                        </tr>
                        <tr>
                            <td height="15"></td>
                        </tr>
                        <tr>
                            <td>
                                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                    <tbody>
                                    <tr>
                                        @php
                                            $count_questions = count((array)$all_product_order_data->question);
                                            $iter = 0;
                                        @endphp

                                        <td width="320">
                                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                <tbody>
                                                @php
                                                    foreach ($all_product_order_data->question as $key=>$question){
                                                        $iter++;
                                                        if($iter > (int)($count_questions / 2) ){
                                                            break;
                                                        }
                                                @endphp
                                                <tr>
                                                    <td style="padding: 6px 0;">
                                                        <span style="font-size: 20px; line-height: 24px;color: #f6ba04;">{{ \App\Question::where('id', $key)->first()->name }}
                                                            :</span><br/><span
                                                                style="font-size: 16px; line-height: 22px;">
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
                                                                {{ isset($item_field->name) ? $item_field->name : '' }} <br>
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
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="1" bgcolor="#bcbcbc"></td>
                                                </tr>
                                                @php
                                                    }
                                                @endphp
                                                </tbody>
                                            </table>
                                        </td>

                                        <td width="160"></td>

                                        <td width="320">
                                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                <tbody>
                                                @php
                                                    $iter2 = 0;
                                                    foreach ($all_product_order_data->question as $key=>$question){
                                                        $iter2++;
                                                        if($iter2 >= $iter ){
                                                @endphp
                                                <tr>
                                                    <td style="padding: 6px 0;">
                                                        <span style="font-size: 18px; line-height: 24px;color: #f6ba04;">{{ \App\Question::where('id', $key)->first()->name }}
                                                            :</span> <br/><span
                                                                style="font-size: 16px; line-height: 22px;">
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
                                                                {{ isset($item_field->name) ? $item_field->name : '' }} <br>
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
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="1" bgcolor="#bcbcbc"></td>
                                                </tr>
                                                @php
                                                    }
                                                }
                                                @endphp
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td height="40"></td>
                        </tr>
                    @endif
                    @if(!empty($all_product_order_data->additional_questions))
                        <tr>
                            <td style="padding-bottom: 5px;">
                                <span style="font-size: 23px;"><b>Add-ON Questions</b></span>
                            </td>
                        </tr>
                        <tr>
                            <td height="3" bgcolor="#f6ba04"></td>
                        </tr>
                        <tr>
                            <td height="15"></td>
                        </tr>
                        <tr>
                            <td>
                                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                    <tbody>
                                    @php
                                        $key_addtional_service_iter = 1;
                                        $additional_services_array = [];
                                    $force_break_count = count((array)$all_product_order_data->additional_questions);
                                    @endphp
                                    @foreach ($all_product_order_data->additional_questions as $key_additional_questions=>$additional_questions)
                                        @if($key_addtional_service_iter % 2 != 0)
                                            <tr>
                                                @endif
                                                <td width="320">
                                                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                        <tbody>
                                                        @if(\App\Service::where('id', $key_additional_questions)->first())
                                                            <tr>
                                                                <td>
                                                                    <span style="font-size: 23px;"><b>{{ \App\Service::where('id', $key_additional_questions)->first()->name }}</b></span>
                                                                </td>
                                                            </tr>
                                                        @endif
                                                        @php
                                                            foreach ($additional_questions as $key=>$question){
                                                                if(\App\Question::where('id', $key)->first()){

                                                                }
                                                                else{
                                                                    break;
                                                                }
                                                        @endphp
                                                        <tr>
                                                            <td style="padding: 6px 0;">
                                                                <span style="font-size: 18px; line-height: 24px;color: #f6ba04;">{{ \App\Question::where('id', $key)->first()->name }}
                                                                    :</span><br/><span
                                                                        style="font-size: 16px; line-height: 22px;">
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
                                                                            Name: {{ isset($item_field->name) ? $item_field->name : '' }} <br>
                                                                            Card Number : {{ $item_field->cardnumber }}
                                                                            <br>
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
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td height="1" bgcolor="#bcbcbc"></td>
                                                        </tr>
                                                        @php
                                                            }
                                                        @endphp
                                                        </tbody>
                                                    </table>
                                                </td>
                                                @if($key_addtional_service_iter % 2 != 0 || $force_break_count == 1)
                                                    <td width="160"></td>
                                                @endif
                                                @if($force_break_count == 1)
                                                    <td width="320">
                                                    </td>
                                                @endif
                                                @if($key_addtional_service_iter % 2 == 0 || $force_break_count == 1)
                                            </tr>
                                        @endif
                                        @php
                                            //$additional_services_array[] = $key_additional_services;
                                            $key_addtional_service_iter++;
                                        @endphp
                                    @endforeach
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    @endif
                    @if(!empty($all_product_order_data->billing_info))
                        <tr>
                            <td height="40"></td>
                        </tr>
                        <tr>
                            <td style="padding-bottom: 5px;">
                                <span style="font-size: 23px;"><b>Billing Info:</b></span>
                            </td>
                        </tr>
                        <tr>
                            <td height="3" bgcolor="#f6ba04"></td>
                        </tr>
                        <tr>
                            <td height="15"></td>
                        </tr>
                        <tr>
                            <td>
                                <table border="0" cellpadding="0" cellspacing="0" width="240">
                                    <tbody>
                                    <tr>
                                        <td>
                                                    <span style="font-size:16px; line-height:24px;">
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
                                                        {{ \App\State::where('id',$all_product_order_data->billing_info->state)->first()->abbreviation}}
                                                        <br>
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
                                                        {{ $all_product_order_data->{$payment_method}->number }}
                                                        <br> <br>
                                                        @php
                                                            }
                                                            if(!empty($all_product_order_data->{$payment_method}->account)){
                                                        @endphp
                                                        {{ $all_product_order_data->{$payment_method}->account }} <br>
                                                        @php
                                                            }
                                                            if( isset($all_product_order_data->{$payment_method}->name) && !empty($all_product_order_data->{$payment_method}->name)){
                                                        @endphp
                                                        {{ $all_product_order_data->{$payment_method}->name }} <br>
                                                        @php
                                                            }
                                                            if(!empty($all_product_order_data->{$payment_method}->cardnumber)){
                                                        @endphp
                                                        {{   $all_product_order_data->{$payment_method}->cardnumber }}
                                                        <br>
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
                                                            if(isset($all_product_order_data->{$payment_method}->name) && !empty($all_product_order_data->{$payment_method}->name)){
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
                                                        {{ $all_product_order_data->{$payment_method}->cardnumber }}
                                                        <br>
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
                                                    </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td height="20"></td>
                                    </tr>
                                    <tr>
                                        <td height="3" bgcolor="#f6ba04"></td>
                                    </tr>
                                    <tr>
                                        <td height="5"></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span style="font-size:19px;"><b>IP address:</b> {{ str_replace('.','-',$order->order->ip_address) }}</span>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    @else
                        <tr>
                            <td>
                                <span style="font-size:19px;"><b>IP address:</b> {{ str_replace('.','-',$order->order->ip_address) }}</span>
                            </td>
                        </tr>
                    @endif
                    <tr>
                        <td height="60"></td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        </tbody>
    </table>
@endif