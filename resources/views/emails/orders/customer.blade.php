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

                                        @endphp
                                <td style="font-family: Arial, Helvetica, sans-serif; font-size: 15px; line-height: 20px; color: #223036;">
                                    <p style="margin: 0 0 20px; font-size: 18px;"><b style="color:#f8b104">Dear
                                            {{ isset($product_data->title) ? $product_data->title : '' }} {{ $product_data->first_name }} {{ $product_data->last_name }}
                                        </b></p>
                                    <p style="margin: 0 0 20px;">Thank you for your order, and for giving us the opportunity to serve you.</p>
                                    <p style="margin: 0 0 20px;">Your {{ $order->service }} order for {{ $order->entity_name }} {{ $order->entity_ending }}
                                        has been received and is currently being reviewed by our team of professionals.</p>
                                    <p style="margin: 0 0 20px;">Your order reference is <b style="color:#f8b104"></b></p>
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
@php
die();
@endphp