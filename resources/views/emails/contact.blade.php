<div>
    <strong>Name: </strong><span>{{$form_data['name']}}</span>
</div>
@if(isset($form_data['business_name']) && !empty($form_data['business_name']))
    <div>
        <strong>Business name: </strong><span>{{$form_data['business_name']}}</span>
    </div>
@endif
@if(isset($form_data['email']) && !empty($form_data['email']))
    <div>
        <strong>Other Email: </strong><span>{{$form_data['email']}}</span>
    </div>
@endif
@if(isset($form_data['phone']) && !empty($form_data['phone']))
    <div>
        <strong>Phone Number: </strong><span>{{$form_data['phone']}}</span>
    </div>
@endif
@if(isset($form_data['message']) && !empty($form_data['message']))
    <div>
        <strong>Message / Request: </strong><p>@php echo html_entity_decode(htmlentities(preg_replace("/\r\n|\r|\n/",'<br/>',$form_data['message']))) @endphp</p>
    </div>
@endif
@if(isset($ip_address) && !empty($ip_address))
    <div>
        <strong>Ip Address: </strong><span>{{ str_replace('.','-',$ip_address) }}</span>
    </div>
@endif