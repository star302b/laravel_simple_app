@php
    $all_product_order_data_main = '';
    $flag_exit_loop = false;

@endphp
<table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tbody>
    @php
        $all_product_order_data = '';
            if(isset($order->data)){
            $all_product_order_data = json_decode($order->data);
            }
            $main_Service_Id = $service_id;
            $main_State_Id = $state_id;
    @endphp
    @if($all_product_order_data)


        <tr class="form-group ">
            <td class="col-sm-2  control-label">Order #{{$order->order_id}}
            </td>
        </tr>
        <tr class="form-group ">
            <td class="col-sm-2  control-label">IP address {{ str_replace('.','-',$order->order->ip_address) }}
            </td>
        </tr>
        <tr class="form-group ">
            <td class="col-sm-2  control-label">State {{$state_name}}
            </td>
        </tr>
        <tr class="form-group ">
            <td class="col-sm-2  control-label">Service {{$service_name}}
            </td>
        </tr>
        <tr class="form-group ">
            <td class="col-sm-2  control-label">Total Price {{$order->price}}$
            </td>
        </tr>

        {{--@if(!empty($all_product_order_data->prices))--}}
        {{--@foreach($all_product_order_data->prices as $price_fist_level)--}}
        {{--@if(isset($price_fist_level->name))--}}
        {{--<tr class="form-group ">--}}
        {{--<td class="col-sm-2  control-label">{{$price_fist_level->name}} {{$price_fist_level->price}}$--}}
        {{--</td>--}}
        {{--</tr>--}}
        {{--@endif--}}
        {{--@endforeach--}}
        {{--@endif--}}


        @if(!empty($all_product_order_data->prices))
            @foreach($all_product_order_data->prices as $price_fist_key => $price_fist_level)
                @if(isset($price_fist_level->name) && $price_fist_key != 'service_type')
                    <tr class="form-group ">
                        {{--<td class="col-sm-2  control-label"></td>--}}
                        <td class="col-sm-8">
                            {{$price_fist_level->name}} ${{$price_fist_level->price}}
                        </td>
                    </tr>
                @elseif($price_fist_key == 'service_type')
                    <tr class="form-group ">
                        {{--<td class="col-sm-2  control-label"></td>--}}
                        <td class="col-sm-8">
                            Type {{$price_fist_level->name}}
                        </td>
                    </tr>
                    @if(isset($all_product_order_data->service_service_type) && isset($all_product_order_data->entity_info_questions))
                        @if($all_product_order_data->service_service_type == 400 || $all_product_order_data->service_service_type == 401)
                            @foreach($all_product_order_data->entity_info_questions as $entity_info_questions)
                                @foreach($entity_info_questions as $key_field=> $item_field)
                                    @foreach($item_field as $key_field1=> $item_field1)
                                        <tr class="form-group ">
                                            {{--<td class="col-sm-2  control-label"></td>--}}
                                            <td class="col-sm-8">
                                                County {{ \App\FieldOption::where('id', $key_field1)->first()->getValueAdmin($item_field1)}}
                                            </td>
                                        </tr>
                                        <tr class="form-group ">
                                            {{--<td class="col-sm-2  control-label">County Price</td>--}}
                                            <td class="col-sm-8">
                                                County Price ${{ \App\FieldOption::where('id', $key_field1)->first()->getValuePriceAdmin($item_field1)}}
                                            </td>
                                        </tr>
                                    @endforeach
                                @endforeach
                            @endforeach
                        @endif
                    @endif


                @endif
            @endforeach
        @endif

        @if(!empty($all_product_order_data->prices))
            @php
                $total_sum = 0;
            @endphp
            <tr class="row">
                <td class="col-sm-12 "><h4>{{ 'Total Summary' }}</h4></td>
            </tr>
            @foreach($all_product_order_data->prices as $price_fist_key => $price_fist_level)
                @if(is_array($price_fist_level))

                    @foreach($price_fist_level as $price_second_key=>$price_second_level)

                        @if(is_array($price_second_level))
                            @foreach($price_second_level as $price_third_key=>$price_third_level )
                                <tr class="form-group ">
                                    {{--<td class="col-sm-2  control-label">{{$price_third_level->name}}</td>--}}
                                    <td class="col-sm-8">
                                        {{$price_third_level->name}} ${{$price_third_level->price}}
                                    </td>
                                </tr>
                                @php
                                    $total_sum += $price_third_level->price;
                                @endphp
                            @endforeach
                        @else
                            @if($price_second_level->name == 'LLC Publishing')
                                <tr class="form-group ">
                                    {{--<td class="col-sm-2  control-label">Add-on {{$price_second_level->name}}</td>--}}
                                    <td class="col-sm-8">
                                        Add-on {{$price_second_level->name}} ${{ $price_second_level->name == 'EIN' ? 0 : $price_second_level->price}}
                                    </td>
                                </tr>
                                @if(isset($all_product_order_data->additional_service_types->{"62"}))
                                    @if(\App\ServiceServiceType::where('service_id',62)->where('service_type_id',$all_product_order_data->additional_service_types->{"62"})->first())
                                        <tr class="form-group ">
                                            {{--<td class="col-sm-2  control-label">Add-on {{$price_second_level->name}} Type                                            </td>--}}
                                            <td class="col-sm-8">
                                                Add-on {{$price_second_level->name}} Type
                                                @php
                                                               echo \App\ServiceServiceType::where('service_id',62)->where('service_type_id',$all_product_order_data->additional_service_types->{"62"})->first()->service_type_alter_name;
                                                           @endphp
                                            </td>
                                        </tr>
                                    @endif
                                @endif
                                @if(isset($all_product_order_data->additional_questions->{"62"}->{"290"}->{"1"}->{"687"}))
                                    @if( \App\FieldOption::where('id', 687)->first())
                                        <tr class="form-group ">
                                            {{--<td class="col-sm-2  control-label">Add-on {{$price_second_level->name}} County--}}
                                            {{--</td>--}}
                                            <td class="col-sm-8">
                                                Add-on {{$price_second_level->name}} County {{ \App\FieldOption::where('id', 687)->first()->getValueAdmin($all_product_order_data->additional_questions->{"62"}->{"290"}->{"1"}->{"687"}) }}
                                            </td>
                                        </tr>
                                    @endif
                                @elseif(isset($all_product_order_data->additional_questions->{"62"}->{"292"}->{"1"}->{"689"}))
                                    @if( \App\FieldOption::where('id', 689)->first())
                                        <tr class="form-group ">
                                            {{--<td class="col-sm-2  control-label">{{$price_second_level->name}} County--}}
                                            {{--</td>--}}
                                            <td class="col-sm-8">
                                                {{$price_second_level->name}} County {{ \App\FieldOption::where('id', 689)->first()->getValueAdmin($all_product_order_data->additional_questions->{"62"}->{"292"}->{"1"}->{"689"}) }}
                                            </td>
                                        </tr>
                                    @endif
                                @endif
                            @else
                                <tr class="form-group ">
                                    {{--<td class="col-sm-2  control-label">{{$price_second_level->name}}</td>--}}
                                    <td class="col-sm-8">
                                        {{$price_second_level->name}} ${{$price_second_level->price}}
                                    </td>
                                </tr>
                            @endif
                            @php
                            if($price_second_level->name == 'EIN'){

                            }else{
                                $total_sum += $price_second_level->price;
                            }
                            @endphp
                        @endif
                    @endforeach
                @elseif(isset($price_fist_level->name) && $price_fist_key == 'expediting')
                    @if(isset($all_product_order_data->service_expediting) && \App\ServiceExpediting::where('id',$all_product_order_data->service_expediting)->first())
                    <tr class="form-group ">
                        {{--<td class="col-sm-2  control-label">{{$price_fist_level->name}} - {{\App\ServiceExpediting::where('id',$all_product_order_data->service_expediting)->first()->time}}</td>--}}
                        <td class="col-sm-8">
                            {{$price_fist_level->name}} - {{\App\ServiceExpediting::where('id',$all_product_order_data->service_expediting)->first()->time}} ${{$price_fist_level->price}}
                        </td>
                    </tr>
                    @php
                        $total_sum += $price_fist_level->price;

                    @endphp
                    @endif
                @elseif(isset($price_fist_level->name))
                    <tr class="form-group ">
                        {{--<td class="col-sm-2  control-label">{{$price_fist_level->name}}</td>--}}
                        <td class="col-sm-8">
                            {{$price_fist_level->name}} ${{$price_fist_level->price}}
                        </td>
                    </tr>
                    @php
                        $total_sum += $price_fist_level->price;
                    @endphp
                @elseif(is_object($price_fist_level) && $price_fist_key == 'additional_services')
                    @foreach($price_fist_level as $price_second_key=>$price_second_level)

                        @if(is_array($price_second_level))
                            @foreach($price_second_level as $price_third_key=>$price_third_level )
                                <tr class="form-group ">
                                    {{--<td class="col-sm-2  control-label">Add-on {{$price_third_level->name}}</td>--}}
                                    <td class="col-sm-8">
                                        Add-on {{$price_third_level->name}} ${{ $price_third_level->name == 'EIN' ? 0 : $price_third_level->price}}
                                    </td>
                                </tr>
                                @php
                                    if($price_third_level->name == 'EIN'){

                                    }else{
                                                                        $total_sum += $price_third_level->price;
                                    }
                                @endphp
                            @endforeach
                        @else
                            @if($price_second_level->price)
                                <tr class="form-group ">
                                    {{--<td class="col-sm-2  control-label">Add-on {{$price_second_level->name}}</td>--}}
                                    <td class="col-sm-8">
                                        Add-on {{$price_second_level->name}} ${{$price_second_level->price}}
                                    </td>
                                </tr>

                                @php
                                    $total_sum += $price_second_level->price;
                                @endphp
                            @endif
                        @endif
                    @endforeach
                @elseif(is_object($price_fist_level) && $price_fist_key == 'additional_service_expediting')
                    @foreach($price_fist_level as $price_second_key=>$price_second_level)

                        @if(is_array($price_second_level))
                            @foreach($price_second_level as $price_third_key=>$price_third_level )
                                <tr class="form-group ">
                                    {{--<td class="col-sm-2  control-label">{{$price_third_level->name}}</td>--}}
                                    <td class="col-sm-8">
                                        {{$price_third_level->name}} ${{$price_third_level->price}}
                                    </td>
                                </tr>
                                @php
                                    $total_sum += $price_third_level->price;
                                @endphp
                            @endforeach
                        @else
                            <tr class="form-group ">
                                {{--<td class="col-sm-2  control-label">{{$price_second_level->name}}</td>--}}
                                <td class="col-sm-8">
                                    {{$price_second_level->name}} ${{$price_second_level->price}}
                                </td>
                            </tr>
                            @php
                                $total_sum += $price_second_level->price;
                            @endphp
                        @endif
                    @endforeach
                @endif
            @endforeach
            <tr class="form-group ">
                {{--<td class="col-sm-2  control-label">Total</td>--}}
                <td class="col-sm-8">
                    Total ${{$total_sum}}
                </td>
            </tr>
        @endif





        @php
            if(!empty($all_product_order_data->contact_info)){
        @endphp
        <tr class="row">
            <td class="col-sm-12 "><h4>{{ 'Contact info' }}</h4></td>
        </tr>
        @php
            if(!empty($all_product_order_data->contact_info->name)){
        @endphp
        <tr class="form-group ">
            {{--<td class="col-sm-2  control-label">Name</td>--}}
            <td class="col-sm-8">
                {{$all_product_order_data->contact_info->name}}
            </td>
        </tr>
        @php
            }
            if(!empty($all_product_order_data->contact_info->title)){
        @endphp
        <tr class="form-group ">
            {{--<td class="col-sm-2  control-label">Title</td>--}}
            <td class="col-sm-8">
                {{$all_product_order_data->contact_info->title}}
            </td>
        </tr>
        @php
            }
            if(!empty($all_product_order_data->contact_info->suffix)){
        @endphp
        <tr class="form-group ">
            {{--<td class="col-sm-2  control-label">Suffix</td>--}}
            <td class="col-sm-8">
                {{$all_product_order_data->contact_info->suffix}}
            </td>
        </tr>
        @php
            }
            if(!empty($all_product_order_data->contact_info->phone)){
        @endphp
        <tr class="form-group ">
            {{--<td class="col-sm-2  control-label">Phone</td>--}}
            <td class="col-sm-8">
                {{$all_product_order_data->contact_info->phone}}
            </td>
        </tr>
        @php
            }
            if(!empty($all_product_order_data->contact_info->email)){
        @endphp
        <tr class="form-group ">
            {{--<td class="col-sm-2  control-label">Email</td>--}}
            <td class="col-sm-8">
                {{$all_product_order_data->contact_info->email}}
            </td>
        </tr>
        @php
            }
        }

        if(!empty($all_product_order_data->billing_info)){
        @endphp
        <tr class="row">
            <td class="col-sm-12 "><h4>{{ 'Billing info' }}</h4></td>
        </tr>
        @php

            if(!empty($all_product_order_data->billing_info->same_address)){
        if(\App\Question::where('id',$all_product_order_data->billing_info->same_address)->first()){
        @endphp
        <tr class="form-group ">
            {{--<td class="col-sm-2  control-label">Same Address</td>--}}
            <td class="col-sm-8">
                {{
        \App\Question::where('id',$all_product_order_data->billing_info->same_address)->first()->name
        }}
            </td>
        </tr>
        @php
            }
              }

            if(!empty($all_product_order_data->billing_info->address)){
        @endphp
        <tr class="form-group ">
            {{--<td class="col-sm-2  control-label">Address</td>--}}
            <td class="col-sm-8">
                {{$all_product_order_data->billing_info->address}}
            </td>
        </tr>
        @php
            }
            if(!empty($all_product_order_data->billing_info->address2)){
        @endphp
        <tr class="form-group ">
            {{--<td class="col-sm-2  control-label">Address 2</td>--}}
            <td class="col-sm-8">
                {{$all_product_order_data->billing_info->address2}}
            </td>
        </tr>
        @php
            }
            if(!empty($all_product_order_data->billing_info->city)){
        @endphp
        <tr class="form-group ">
            {{--<td class="col-sm-2  control-label">City</td>--}}
            <td class="col-sm-8">
                {{$all_product_order_data->billing_info->city}}
            </td>
        </tr>
        @php
            }
            if(!empty($all_product_order_data->billing_info->state)){
        @endphp
        <tr class="form-group ">
            {{--<td class="col-sm-2  control-label">State</td>--}}
            <td class="col-sm-8">
                {{ \App\State::where('id',$all_product_order_data->billing_info->state)->first()->abbreviation}}

            </td>
        </tr>
        @php
            }

            if(!empty($all_product_order_data->billing_info->zip)){
        @endphp
        <tr class="form-group ">
            {{--<td class="col-sm-2  control-label">Zip</td>--}}
            <td class="col-sm-8">
                {{$all_product_order_data->billing_info->zip}}
            </td>
        </tr>
        @php
            }
        }

        if(!empty($all_product_order_data->{'payment-method'})){
        @endphp
        <tr class="row">
            <td class="col-sm-12 "><h4>Payment info</h4></td>
        </tr>
        @php
            if(!empty($all_product_order_data->{'payment-method'})){
        @endphp
        <tr class="form-group ">
            <td class="col-sm-2  control-label">Payment method
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
            </td>
        </tr>
        @php
            }

            $payment_method = $all_product_order_data->{'payment-method'};
            if($payment_method == 'e-check'){
            if(!empty($all_product_order_data->{$payment_method}->check)){
        @endphp
        <tr class="form-group ">
            {{--<td class="col-sm-2  control-label">Check file</td>--}}
            <td class="col-sm-8">
                <a href="https://usacorpinc.com{{\Illuminate\Support\Facades\Storage::url($all_product_order_data->{$payment_method}->check)}}"
                   download="">Download</a>
            </td>
        </tr>
        @php
            }


            if(!empty($all_product_order_data->{$payment_method}->number)){
        @endphp
        <tr class="form-group ">
            {{--<td class="col-sm-2  control-label">Card Number</td>--}}
            <td class="col-sm-8">
                {{ $all_product_order_data->{$payment_method}->number }}
            </td>
        </tr>
        @php
            }
            if(!empty($all_product_order_data->{$payment_method}->account)){
        @endphp
        <tr class="form-group ">
            {{--<td class="col-sm-2  control-label">Bank Account Number</td>--}}
            <td class="col-sm-8">
                {{ $all_product_order_data->{$payment_method}->account }}
            </td>
        </tr>
        @php
            }
            if(!empty($all_product_order_data->{$payment_method}->name)){
        @endphp
        <tr class="form-group ">
            {{--<td class="col-sm-2  control-label">Name on card</td>--}}
            <td class="col-sm-8">
                {{ $all_product_order_data->{$payment_method}->name }}
            </td>
        </tr>
        @php
            }
if(!empty($all_product_order_data->{$payment_method}->cardnumber)){
        @endphp
        <tr class="form-group ">
            {{--<td class="col-sm-2  control-label">Card Number</td>--}}
            <td class="col-sm-8">
                {{   $all_product_order_data->{$payment_method}->cardnumber }}
            </td>
        </tr>
        @php
            }
            if(!empty($all_product_order_data->{$payment_method}->date)){
        @endphp
        <tr class="form-group ">
            {{--<td class="col-sm-2  control-label">Expiration</td>--}}
            <td class="col-sm-8">{{$all_product_order_data->{$payment_method}->date}}
            </td>
        </tr>
        @php
            }

            if(!empty($all_product_order_data->{$payment_method}->year)){
        @endphp
        <tr class="form-group ">
            {{--<td class="col-sm-2  control-label">Year</td>--}}
            <td class="col-sm-8">
                {{$all_product_order_data->{$payment_method}->year}}
            </td>
        </tr>
        @php
            }
            if(!empty($all_product_order_data->{$payment_method}->cvv)){
        @endphp
        <tr class="form-group ">
            {{--<td class="col-sm-2  control-label">CVV</td>--}}
            <td class="col-sm-8">
                {{$all_product_order_data->{$payment_method}->cvv}}
            </td>
        </tr>
        @php
            }



            if(!empty($all_product_order_data->{$payment_method}->name2)){
        @endphp
        <tr class="form-group ">
            {{--<td class="col-sm-2  control-label">Name on card</td>--}}
            <td class="col-sm-8">
                {{$all_product_order_data->{$payment_method}->name2}}
            </td>
        </tr>
        @php
            }


            if(!empty($all_product_order_data->{$payment_method}->order_id)){
        @endphp
        <tr class="form-group ">
            {{--<td class="col-sm-2  control-label">PayPal order id</td>--}}
            <td class="col-sm-8">
                {{$all_product_order_data->{$payment_method}->order_id}}
            </td>
        </tr>
        @php
            }

            if(!empty($all_product_order_data->{'usa-acc'}->number)){
        @endphp
        <tr class="form-group ">
            {{--<td class="col-sm-2  control-label">USACORP account number</td>--}}
            <td class="col-sm-8">
                {{$all_product_order_data->{$payment_method}->number}}
            </td>
        </tr>
        @php
            }
            }
            else{
        if(!empty($all_product_order_data->{$payment_method}->check)){
        @endphp
        <tr class="form-group ">
            {{--<td class="col-sm-2  control-label">Check file</td>--}}
            <td class="col-sm-8">
                <a href="https://usacorpinc.com{{\Illuminate\Support\Facades\Storage::url($all_product_order_data->{$payment_method}->check)}}"
                   download="">Download</a>
            </td>
        </tr>
        @php
            }
            if(!empty($all_product_order_data->{$payment_method}->name)){
        @endphp
        <tr class="form-group ">
            {{--<td class="col-sm-2  control-label">Name on card</td>--}}
            <td class="col-sm-8">
                {{ $all_product_order_data->{$payment_method}->name }}
            </td>
        </tr>
        @php
            }

            if(!empty($all_product_order_data->{$payment_method}->number)){
        @endphp
        <tr class="form-group ">
            {{--<td class="col-sm-2  control-label">Card Number</td>--}}
            <td class="col-sm-8">
                {{ $all_product_order_data->{$payment_method}->number }}
            </td>
        </tr>
        @php
            }

            if(!empty($all_product_order_data->{$payment_method}->date)){
        @endphp
        <tr class="form-group ">
            {{--<td class="col-sm-2  control-label">Expiration</td>--}}
            <td class="col-sm-8">{{$all_product_order_data->{$payment_method}->date}}
            </td>
        </tr>
        @php
            }

            if(!empty($all_product_order_data->{$payment_method}->year)){
        @endphp
        <tr class="form-group ">
            {{--<td class="col-sm-2  control-label">Year</td>--}}
            <td class="col-sm-8">
                {{$all_product_order_data->{$payment_method}->year}}
            </td>
        </tr>
        @php
            }
            if(!empty($all_product_order_data->{$payment_method}->cvv)){
        @endphp
        <tr class="form-group ">
            {{--<td class="col-sm-2  control-label">CVV</td>--}}
            <td class="col-sm-8">
                {{$all_product_order_data->{$payment_method}->cvv}}
            </td>
        </tr>
        @php
            }

            if(!empty($all_product_order_data->{$payment_method}->account)){
        @endphp
        <tr class="form-group ">
            {{--<td class="col-sm-2  control-label">Bank Account Number</td>--}}
            <td class="col-sm-8">
                {{ $all_product_order_data->{$payment_method}->account }}
            </td>
        </tr>
        @php
            }

            if(!empty($all_product_order_data->{$payment_method}->name2)){
        @endphp
        <tr class="form-group ">
            {{--<td class="col-sm-2  control-label">Name on card</td>--}}
            <td class="col-sm-8">
                {{$all_product_order_data->{$payment_method}->name2}}
            </td>
        </tr>
        @php
            }

            if(!empty($all_product_order_data->{$payment_method}->cardnumber)){
        @endphp
        <tr class="form-group ">
            {{--<td class="col-sm-2  control-label">Card Number</td>--}}
            <td class="col-sm-8">
                {{   $all_product_order_data->{$payment_method}->cardnumber }}
            </td>
        </tr>
        @php
            }
            if(!empty($all_product_order_data->{$payment_method}->order_id)){
        @endphp
        <tr class="form-group ">
            {{--<td class="col-sm-2  control-label">PayPal order id</td>--}}
            <td class="col-sm-8">
                {{$all_product_order_data->{$payment_method}->order_id}}
            </td>
        </tr>
        @php
            }

            if(!empty($all_product_order_data->{'usa-acc'}->number)){
        @endphp
        <tr class="form-group ">
            {{--<td class="col-sm-2  control-label">USACORP account number</td>--}}
            <td class="col-sm-8">
                {{$all_product_order_data->{$payment_method}->number}}
            </td>
        </tr>
        @php
            }
}
        }



        if(!empty($all_product_order_data->step_fifth_contact_info)){
        @endphp
        <tr class="row">
            <td class="col-sm-12 "><h4>{{ 'Contact info from Step 5' }}</h4></td>
        </tr>
        @php
            if(!empty($all_product_order_data->step_fifth_contact_info->first_name)){
        @endphp
        <tr class="form-group ">
            {{--<td class="col-sm-2  control-label">First name</td>--}}
            <td class="col-sm-8">
                {{$all_product_order_data->step_fifth_contact_info->first_name}}
            </td>
        </tr>
        @php
            }
            if(!empty($all_product_order_data->step_fifth_contact_info->last_name)){
        @endphp
        <tr class="form-group ">
            {{--<td class="col-sm-2  control-label">Last name</td>--}}
            <td class="col-sm-8">
                {{$all_product_order_data->step_fifth_contact_info->last_name}}
            </td>
        </tr>
        @php
            }

            if(!empty($all_product_order_data->step_fifth_contact_info->same_address)){
        if(\App\Question::where('id',$all_product_order_data->step_fifth_contact_info->same_address)->first()){
        @endphp
        <tr class="form-group ">
            {{--<td class="col-sm-2  control-label">Same address</td>--}}
            <td class="col-sm-8">{{
                                               \App\Question::where('id',$all_product_order_data->step_fifth_contact_info->same_address)->first()->name
                                               }}
            </td>
        </tr>
        @php
            }
            }

            if(!empty($all_product_order_data->step_fifth_contact_info->address)){
        @endphp
        <tr class="form-group ">
            {{--<td class="col-sm-2  control-label">Address</td>--}}
            {{--<td></td>--}}
            <td class="col-sm-8">
                {{$all_product_order_data->step_fifth_contact_info->address}}
            </td>
        </tr>
        @php
            }
            if(!empty($all_product_order_data->step_fifth_contact_info->address2)){
        @endphp
        <tr class="form-group ">
            {{--<td class="col-sm-2  control-label">Address 2</td>--}}
            {{--<td></td>--}}

            <td class="col-sm-8">
                {{$all_product_order_data->step_fifth_contact_info->address2}}
            </td>
        </tr>
        @php
            }
            if(!empty($all_product_order_data->step_fifth_contact_info->city)){
        @endphp
        <tr class="form-group ">
            {{--<td class="col-sm-2  control-label">City</td>--}}
            {{--<td></td>--}}

            <td class="col-sm-8">
                {{$all_product_order_data->step_fifth_contact_info->city}}
            </td>
        </tr>
        @php
            }

            if(!empty($all_product_order_data->step_fifth_contact_info->state)){
        @endphp
        <tr class="form-group ">
            {{--<td class="col-sm-2  control-label">State</td>--}}
            {{--<td></td>--}}

            <td>{{ \App\State::where('id',$all_product_order_data->step_fifth_contact_info->state)->first()->abbreviation}}
            </td>
        </tr>
        @php
            }
            if(!empty($all_product_order_data->step_fifth_contact_info->zip)){
        @endphp
        <tr class="form-group ">
            {{--<td class="col-sm-2  control-label">Zip</td>--}}
            {{--<td></td>--}}

            <td class="col-sm-8">
                {{$all_product_order_data->step_fifth_contact_info->zip}}
            </td>
        </tr>
        @php
            }
            if(!empty($all_product_order_data->step_fifth_contact_info->phone)){
        @endphp
        <tr class="form-group ">
            {{--<td class="col-sm-2  control-label">Phone</td>--}}
            {{--<td></td>--}}

            <td class="col-sm-8">
                {{$all_product_order_data->step_fifth_contact_info->phone}}
            </td>
        </tr>
        @php
            }
            if(!empty($all_product_order_data->step_fifth_contact_info->phone_type)){
        @endphp
        <tr class="form-group ">
            {{--<td class="col-sm-2  control-label">Phone type</td>--}}
            {{--<td></td>--}}

            <td class="col-sm-8">
                {{$all_product_order_data->step_fifth_contact_info->phone_type}}
            </td>
        </tr>
        @php
            }
            if(!empty($all_product_order_data->step_fifth_contact_info->representative)){
        @endphp
        <tr class="form-group ">
            {{--<td class="col-sm-2  control-label">Representative</td>--}}
            {{--<td></td>--}}

            <td class="col-sm-8">
                {{$all_product_order_data->step_fifth_contact_info->representative}}
            </td>
        </tr>
        @php
            }
            if(!empty($all_product_order_data->step_fifth_contact_info->email)){
        @endphp
        <tr class="form-group ">
            {{--<label class="col-sm-2  control-label">Email</label>--}}
            {{--<td></td>--}}

            <td class="col-sm-8">
                {{$all_product_order_data->step_fifth_contact_info->email}}
            </td>
        </tr>
        @php
            }
            if(!empty($all_product_order_data->step_fifth_contact_info->fax)){
        @endphp
        <tr class="form-group ">
            {{--<td class="col-sm-2  control-label">Fax</td>--}}
            {{--<td></td>--}}

            <td class="col-sm-8">
                {{$all_product_order_data->step_fifth_contact_info->fax}}
            </td>
        </tr>
        @php
            }
            }
            $additional_services_array = [];

            if(!empty($all_product_order_data->additional_services)){
        @endphp
        <tr class="row">
            <td class="col-sm-12 "><h4>{{ 'Additional Services' }}</h4></td>
        </tr>
        @php
            foreach ($all_product_order_data->additional_services as $key_additional_services=>$additional_services){
            $additional_services_array[] = $key_additional_services;

        @endphp
        @if(\App\Service::where('id', $key_additional_services)->firstOrFail())
            <tr class="form-group ">
                {{--<td class="col-sm-2  control-label">Service</td>--}}
                {{--<td></td>--}}

                <td class="col-sm-8">
                    {{ \App\Service::where('id', $key_additional_services)->first()->name }}
                </td>
            </tr>
            @if(\App\AdditionalService::where('child_service_id', $key_additional_services)->where('parent_service_id',$service_id)->first())
                <tr class="form-group ">
                    {{--<td class="col-sm-2  control-label">Price</td>--}}
                    <td class="col-sm-8"> {{ \App\AdditionalService::where('child_service_id', $key_additional_services)->where('parent_service_id',$service_id)->first()->price }}
                        $
                    </td>
                </tr>
            @endif
        @endif
        @php
            }
                    }
                    if(!empty($all_product_order_data->service_expediting)){
        @endphp
        @if(\App\ServiceExpediting::where('id',$all_product_order_data->service_expediting)->first())
            <tr class="row">
                <td class="col-sm-2 "><h4 class="pull-right">{{ 'Service expediting' }}</h4><strong>
                        {{\App\ServiceExpediting::where('id',$all_product_order_data->service_expediting)->first()->option}}
                        {{\App\ServiceExpediting::where('id',$all_product_order_data->service_expediting)->first()->time}}
                    </strong></td>
            </tr>
        @endif
        @php
            }else{
        @endphp
        <tr class="row">
            <td class="col-sm-2 "><h4 class="pull-right">{{ 'Service expediting' }}</h4></td>
            <td class="col-sm-8"><strong>
                    Turnaround time: {{ \App\Service::where('id',$main_Service_Id)->first()->getTurnaroundTime($main_State_Id) }}
                </strong></td>
        </tr>
        @php
            }
if(!empty($all_product_order_data->entity_info_fields)){
        @endphp
        <tr class="row">
            <td class="col-sm-12 "><h4>{{ 'Entity info' }}</h4></td>
        </tr>
        @php
            foreach ($all_product_order_data->entity_info_fields as $entity_key=>$entity_data){

            if($entity_data->input != null && \App\EntityInfoField::where('id', $entity_key)->firstOrFail()){
        @endphp
        <tr class="form-group ">
            {{--<td class="col-sm-2  control-label">{{\App\EntityInfoField::where('id', $entity_key)->first()->label}}</td>--}}
            {{--<td></td>--}}

            <td class="col-sm-8">
                @if(\App\EntityInfoField::where('id', $entity_key)->first()->field_type == 2)

                    @foreach(\App\EntityInfoField::where('id', $entity_key)->first()->getOptions() as $value => $option)
                        @if(!empty($entity_data) && $entity_data->input == $value) {{$option}} @endif
                    @endforeach
                @else
                    {{ \App\EntityInfoField::where('id', $entity_key)->first()->getValue($entity_data)->input }}
                @endif
            </td>
        </tr>
        @php
            }
            }
                }

            if(!empty($all_product_order_data->question)){
        @endphp
        <tr class="row">
            <td class="col-sm-12 "><h4>{{ 'Questions' }}</h4></td>
        </tr>
        @php
            foreach ($all_product_order_data->question as $key=>$question){
        @endphp
        <tr class="row">
            <td class="col-sm-12 "><h4
                        class="pull-right">{{ \App\Question::where('id', $key)->first()->name }}</h4>
            </td>
        </tr>
        @php
            foreach ($question as $key_item=>$question_item){
                foreach ($question_item as $key_field=>$item_field) {
        if(\App\FieldOption::where('id', $key_field)->first()){
        @endphp
        <tr class="form-group ">
            {{--<td class="col-sm-2  control-label">{{\App\FieldOption::where('id', $key_field)->first()->label}}</td>--}}
            {{--<td></td>--}}
            <td class="col-sm-8">
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
                            echo \App\FieldOption::where('id', $key_field)->first()->getValueAdmin($item_field);
                         } catch (\Exception $e) {
                         print_r($item_field);
                         echo \App\FieldOption::where('id', $key_field)->first()->type;
                         }
                    @endphp
                @endif
            </td>
        </tr>
        @php
            }
                }
            }
        }
        }
        if(!empty($all_product_order_data->additional_questions)){
        @endphp
        <tr class="row">
            <td class="col-sm-12 "><h4>{{ 'Additional Service Questions' }}</h4></td>
        </tr>
        @php
            foreach ($all_product_order_data->additional_questions as $key_additional_questions=>$additional_questions){
        if(in_array($key_additional_questions,$additional_services_array)){
        if(\App\Service::where('id', $key_additional_questions)->first()){
        @endphp
        <tr class="row">
            <td class="col-sm-12 "><h4>Additional
                    Service {{ \App\Service::where('id', $key_additional_questions)->first()->name }}</h4>
            </td>
        </tr>
        @php
            }


                foreach ($additional_questions as $key=>$question){
            if(\App\Question::where('id', $key)->first()){}
            else{
            break;
            }

        @endphp
        <tr class="row">
            <td class="col-sm-12 "><h4
                        class="pull-right">{{ \App\Question::where('id', $key)->first()->name }}</h4>
            </td>
        </tr>
        @php

            foreach ($question as $key_item=>$question_item){
                foreach ($question_item as $key_field=>$item_field) {
                    if(\App\FieldOption::where('id', $key_field)->first()){
        @endphp
        <tr class="form-group ">
            {{--<td class="col-sm-2  control-label">{{\App\FieldOption::where('id', $key_field)->first()->label}}</td> --}}
            {{--<td></td>--}}
            <td class="col-sm-8">
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
                                echo \App\FieldOption::where('id', $key_field)->first()->getValueAdmin($item_field);
                             } catch (\Exception $e) {
                             print_r($item_field);
                             echo \App\FieldOption::where('id', $key_field)->first()->type;
                             }
                        @endphp
                    @endif
                @endif
            </td>
        </tr>
        @php
            }
                    }

                    }
                }
            }
        }
        }
        @endphp
    @endif
    </tbody>
</table>