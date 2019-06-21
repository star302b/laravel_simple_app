<table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tbody>
    <tr>
        <td bgcolor="#e9e9e9" height="40"></td>
    </tr>
    <tr>
        <td bgcolor="#e9e9e9" align="center">
            <table border="0" cellpadding="0" cellspacing="0" width="770" bgcolor="#ffffff">
                <tbody>
                <tr>
                    <td bgcolor="#ffffff" align="center">
                        <table border="0" cellpadding="0" cellspacing="0" width="560" bgcolor="#ffffff">
                            <tbody>
                            <tr>
                                <td height="48">
                                    <img src="http://usacorpdev.itcraftlab.com/images/transparent.png" width="1" height="1" alt="">
                                </td>
                            </tr>
                            <tr>
                                <td align="center">
                                    <img src="http://usacorpdev.itcraftlab.com/images/logo-email.png" alt="USA CORP">
                                </td>
                            </tr>
                            <tr>
                                <td height="42">
                                    <img src="http://usacorpdev.itcraftlab.com/images/transparent.png" width="1" height="1" alt="">
                                </td>
                            </tr>
                            <tr>
                                <td height="1" bgcolor="#beb5a1">
                                    <img src="http://usacorpdev.itcraftlab.com/images/transparent.png" alt="">
                                </td>
                            </tr>
                            <tr>
                                <td height="48">
                                    <img src="http://usacorpdev.itcraftlab.com/images/transparent.png" width="1" height="1" alt="">
                                </td>
                            </tr>
                            <tr>
                                @php
                                        if(isset($order->data)){
                                        $product_data = json_decode($order->data);
                                        }
                                        $additional_company_names = array();
                                        if(isset($product_data->additional_entity_info_fields) && !empty($product_data->additional_entity_info_fields)){
                                            foreach ($product_data->additional_entity_info_fields as $additional_entity_info_fields){
                                                if(isset($additional_entity_info_fields->{20}) && !empty($additional_entity_info_fields->{20})){
                                                    if(isset($additional_entity_info_fields->{20}->input) && !empty($additional_entity_info_fields->{20}->input)){
                                                        $additional_company_names[] = $additional_entity_info_fields->{20}->input;
                                                    }
                                                }
                                            }
                                        }
                                        if(!empty($additional_company_names)){
                                            $additional_company_names = implode(',',$additional_company_names);
                                        }
                                        @endphp
                                <td style="font-family: Arial, Helvetica, sans-serif; font-size: 15px; line-height: 20px; color: #223036;">
                                    <p style="margin: 0 0 20px; font-size: 18px;"><b style="color:#f8b104">Dear
                                            @php
                                                if(!empty($product_data->step_fifth_contact_info->first_name)){
                                            echo $product_data->step_fifth_contact_info->first_name . ' ';
                                                }
                                                if(!empty($product_data->step_fifth_contact_info->last_name)){
                                            echo $product_data->step_fifth_contact_info->last_name;
                                                }
                                            @endphp
                                        </b></p>
                                    <p style="margin: 0 0 20px;">Thank you for your order, and for giving us the opportunity to serve you.</p>
                                    <p style="margin: 0 0 20px;">Your {{ \App\Service::where('id',$order->service_id)->first()->name }} order for {{ $company_name }}
                                        @if(!empty($additional_company_names))
                                            and {{ $additional_company_names }}
                                        @endif
                                        has been received and is currently being reviewed by our team of professionals.</p>
                                    <p style="margin: 0 0 20px;">Your order reference is <b style="color:#f8b104">{{ $company_name }}</b></p>
                                    <p style="margin: 0 0 20px;">Should you have any questions feel free to email us at service@usacorpinc.com or call 844. USACORP (844.872.2677)</p>
                                    <p style="margin: 0 0 40px;"><b>Thank You!</b></p>
                                    <p style="margin: 0; font-size: 12px;">USACORP Inc <br>325 Division Avenue - Brooklyn NY 11211</p>
                                </td>
                            </tr>
                            <tr>
                                <td height="80">
                                    <img src="http://usacorpdev.itcraftlab.com/images/transparent.png" width="1" height="1" alt="">
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
        <td bgcolor="#e9e9e9" height="40"></td>
    </tr>
    </tbody>
</table>