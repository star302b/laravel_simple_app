<p>Order number #{{ $order->id }}</p><br>
<p>Service {{ $order->service }}</p><br>
@if($order->service_type)
<p>Service Type {{ $order->service_type }}</p><br>
@endif
<p>Entity Name {{ $order->entity_name }} {{ $order->entity_ending }}</p><br>
@if($order->county)
<p>County {{ $order->county }} </p><br>
@endif
@php
$order = json_encode($order->data);
@endphp
@if(isset($order->documents))
    <p>Documents:
    @foreach($order->documents as $document)
        @if($document == 'affidavits')
                Affidavits of Publication<br>
        @endif
        @if($document == 'certificate')
                Certificate of Publication<br>
        @endif
        @if($document == 'publishing')
                Publishing Filing Receipt<br>
        @endif
            @if($document == 'certified')
                Certificate Certified<br>
        @endif
    @endforeach
    </p>
@endif
@if(isset($order->base_main_price))
    <p>Total Price:{{ $order->base_main_price }} </p><br>
@endif
@if(isset($order->date_of_formation))
<p>Date of formation:{{ $order->date_of_formation }} </p><br>
@endif
@if(isset($order->selected_county))
<p>County:{{ $order->selected_county}} </p><br>
@endif
@if(isset($order->your_name))
<p>Your Name:{{ $order->your_name }} </p><br>
@endif
@if(isset($order->your_email))
<p>Email address:{{ $order->your_email }} </p><br>
@endif
@if(isset($order->your_phone))
<p>Phone number:{{ $order->your_phone }} </p><br>
@endif
@if(isset($order->approximage_date))
<p>Approximage Date of filing:{{ $order->approximage_date }} </p><br>
@endif
@if(isset($order->foreign_county))
<p>Foreign County:{{ $order->foreign_county }} </p><br>
@endif
@if(isset($order->copy))
<p>{{ $order->copy }} </p><br>
@endif
{{-- new --}}
@if(isset($order->first_name))
    <p>First Name:{{ $order->first_name }} </p><br>
@endif
@if(isset($order->last_name))
    <p>Last Name:{{ $order->last_name }} </p><br>
@endif
@if(isset($order->title))
    <p>Title:{{ $order->title }} </p><br>
@endif
@if(isset($order->suffix))
    <p>Suffix:{{ $order->suffix }} </p><br>
@endif
@if(isset($order->company_name))
    <p>Company Name:{{ $order->company_name }} </p><br>
@endif
@if(isset($order->contact_phone))
    @foreach($order->contact_phone as $key => $contact_phone)
    <p>Phone:{{ $contact_phone }} Ext. {{ $order->contact_phone_Ext->{$key} }} </p><br>
    @endforeach
@endif
@if(isset($order->contact_email))
    @foreach($order->contact_email as $key => $contact_phone)
        <p>Email:{{ $contact_phone }} </p><br>
    @endforeach
@endif
@if(isset($order->contact_fax))
    <p>Fax:{{ $order->contact_fax }} </p><br>
@endif
Billing Address<br>
@if(isset($order->billing_address))
    <p>Address:{{ $order->billing_address }} </p><br>
@endif
@if(isset($order->billing_address_second))
    <p>Address2:{{ $order->billing_address_second }} </p><br>
@endif
@if(isset($order->billing_city))
    <p>City:{{ $order->billing_city }} </p><br>
@endif
@if(isset($order->billing_state))
    <p>State:{{ $order->billing_state }} </p><br>
@endif
@if(isset($order->billing_zip))
    <p>Zip:{{ $order->billing_zip }} </p><br>
@endif
@if(isset($order->promo_code))
    <p>Promo Code:{{ $order->promo_code }} </p><br>
@endif
