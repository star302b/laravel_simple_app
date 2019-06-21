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
                                    <p style="margin: 0 0 20px;">USACORP has received your call request.</p>
                                    @if(isset($form_data['call_date']) && !empty($form_data['call_date']))
                                        <p style=""><b>Call date: </b>@php echo html_entity_decode(htmlentities(preg_replace("/\r\n|\r|\n/",'<br/>',$form_data['call_date']))) @endphp</p>
                                    @endif
                                    @if(isset($form_data['call_time']) && !empty($form_data['call_time']))
                                        <p style=""><b>Call time: </b>@php echo html_entity_decode(htmlentities(preg_replace("/\r\n|\r|\n/",'<br/>',$form_data['call_time']))) @endphp</p>
                                    @endif
                                    @if(isset($form_data['phone']) && !empty($form_data['phone']))
                                        <p style=""><b>To phone number: </b>{{$form_data['phone']}}</p>
                                    @endif
                                    @if(isset($form_data['subject']) && !empty($form_data['subject']))
                                        <p style=""><b>Topic: </b>{{$form_data['subject']}}</p>
                                    @endif
                                    <p style="margin: 20px 0 20px;">A representitive will be reaching out to you at above phone number, date and time.<br>We are looking forward to serve you!</p>
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