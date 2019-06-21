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
                                <td style="font-family: Arial, Helvetica, sans-serif; font-size: 15px; line-height: 20px; color: #223036;">
                                    <p style="margin: 0 0 20px; font-size: 18px;"><b style="color:#f8b104">Dear {{$form_data['name']}}</b></p>
                                    <p style="margin: 0 0 20px;">USACORP has received your <b>Order Status</b> request.</p>
                                    @if(isset($form_data['service-type']) && !empty($form_data['service-type']))
                                        <p style=""><b>Type Of Service: </b>{{$form_data['service-type']}}</p>
                                    @endif
                                    @if(isset($form_data['entity-name']) && !empty($form_data['entity-name']))
                                        <p style=""><b>Entity Name: </b>{{$form_data['entity-name']}}</p>
                                    @endif
                                    @if(isset($form_data['first-name']) && !empty($form_data['first-name']))
                                        <p style=""><b>First Name: </b>{{$form_data['first-name']}}</p>
                                    @endif
                                    @if(isset($form_data['last-name']) && !empty($form_data['last-name']))
                                        <p style=""><b>Last Name: </b>{{$form_data['last-name']}}</p>
                                    @endif
                                    @if(isset($form_data['order-email']) && !empty($form_data['order-email']))
                                        <p style=""><b>Email used for your USACORP order: </b>{{$form_data['order-email']}}</p>
                                    @endif
                                    @if(isset($form_data['email']) && !empty($form_data['email']))
                                        <p style=""><b>Other Email: </b>{{$form_data['email']}}</p>
                                    @endif
                                    @if(isset($form_data['comment']) && !empty($form_data['comment']))
                                        <p style=""><b>Association with entity: </b>{{$form_data['comment']}}</p>
                                    @endif
                                    <p style="margin: 20px 0 20px;">A representitive will be reaching out to you with the status of your order with 24 business hours.</p>
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