<div>
    <strong>Dear USACORP, there is a new join now request</strong>
</div>
<div>
    <strong>Name: </strong><span>{{$form_data['name']}}</span>
</div>
@if(isset($form_data['comp_name']) && !empty($form_data['comp_name']))
    <div>
        <strong>Company name: </strong><span>@php echo html_entity_decode(htmlentities(preg_replace("/\r\n|\r|\n/",'<br/>',$form_data['comp_name']))) @endphp</span>
    </div>
@endif
@if(isset($form_data['phone']) && !empty($form_data['phone']))
    <div>
        <strong>Phone Number: </strong><span>{{$form_data['phone']}}</span>
    </div>
@endif
@if(isset($form_data['email']) && !empty($form_data['email']))
    <div>
        <strong>Email: </strong><span>{{$form_data['email']}}</span>
    </div>
@endif

@if(isset($form_data['frequently']) && !empty($form_data['frequently']))
    <div>
        <strong>Frequently: </strong><span>@php echo $form_data['frequently']; @endphp</span>
    </div>
@endif
@if(isset($form_data['comment']) && !empty($form_data['comment']))
    <div>
        <strong>About company: </strong><p>@php echo html_entity_decode(htmlentities(preg_replace("/\r\n|\r|\n/",'<br/>',$form_data['comment']))) @endphp</p>
    </div>
@endif
@if(isset($ip_address) && !empty($ip_address))
    <div>
        <strong>Ip Address: </strong><span>{{ str_replace('.','-',$ip_address) }}</span>
    </div>
@endif