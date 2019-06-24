<div>
    <strong>Name: </strong><span>{{$form_data['name']}}</span>
</div>
<div>
    <strong>Entity Name: </strong><span>{{$form_data['entity_name']}}</span>
</div>
@if(isset($form_data['order-email']) && !empty($form_data['order-email']))
    <div>
        <strong>Email used for your USACORP order: </strong><span>{{$form_data['order-email']}}</span>
    </div>
@endif
@if(isset($form_data['email']) && !empty($form_data['email']))
    <div>
        <strong>Other Email: </strong><span>{{$form_data['email']}}</span>
    </div>
@endif
@if(isset($form_data['comment']) && !empty($form_data['comment']))
    <div>
        <strong>Association with entity: </strong><span>{{$form_data['comment']}}</span>
    </div>
@endif
@if(isset($form_data['comments']) && !empty($form_data['comments']))
    <div>
        <strong>Comments: </strong><span>{{$form_data['comments']}}</span>
    </div>
@endif
@if(isset($ip_address) && !empty($ip_address))
    <div>
        <strong>Ip Address: </strong><span>{{ str_replace('.','-',$ip_address) }}</span>
    </div>
@endif