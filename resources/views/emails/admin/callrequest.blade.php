<div>
    <strong>Dear USACORP, there is a call us request</strong>
</div>
<div>
    <strong>Name: </strong><span>{{$form_data['name']}}</span>
</div>
@if(isset($form_data['email']) && !empty($form_data['email']))
    <div>
        <strong>Email: </strong><span>{{$form_data['email']}}</span>
    </div>
@endif
@if(isset($form_data['phone']) && !empty($form_data['phone']))
    <div>
        <strong>Phone Number: </strong><span>{{$form_data['phone']}}</span>
    </div>
@endif
@if(isset($form_data['call_time']) && !empty($form_data['call_time']))
    <div>
        <strong>Time to call: </strong><span>@php echo html_entity_decode(htmlentities(preg_replace("/\r\n|\r|\n/",'<br/>',$form_data['call_time']))) @endphp</span>
    </div>
@endif
@if(isset($form_data['call_date']) && !empty($form_data['call_date']))
    <div>
        <strong>Date: </strong><span>@php echo html_entity_decode(htmlentities(preg_replace("/\r\n|\r|\n/",'<br/>',$form_data['call_date']))) @endphp</span>
    </div>
@endif
@if(isset($form_data['subject']) && !empty($form_data['subject']))
    <div>
        <strong>Topic: </strong><span>@php echo html_entity_decode(htmlentities(preg_replace("/\r\n|\r|\n/",'<br/>',$form_data['subject']))) @endphp</span>
    </div>
@endif
@if(isset($form_data['comment']) && !empty($form_data['comment']))
    <div>
        <strong>Comment: </strong><p>@php echo html_entity_decode(htmlentities(preg_replace("/\r\n|\r|\n/",'<br/>',$form_data['comment']))) @endphp</p>
    </div>
@endif
@if(isset($ip_address) && !empty($ip_address))
    <div>
        <strong>Ip Address: </strong><span>{{ str_replace('.','-',$ip_address) }}</span>
    </div>
@endif