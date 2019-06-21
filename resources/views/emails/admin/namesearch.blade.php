<div>
    <strong>Dear USACORP, there is a new name search request</strong>
</div>
<div>
    <strong>Name: </strong><span>{{$form_data['name']}}</span>
</div>
@if(isset($form_data['id']) && !empty($form_data['id']))
    <div>
        <strong>ID: </strong><span>{{$form_data['id']}}</span>
    </div>
@endif
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
@if(isset($form_data['state']) && !empty($form_data['state']))
    <div>
        <strong>State: </strong><span>@php echo \App\State::where('id',$form_data['state'])->first()->name; @endphp</span>
    </div>
@endif
@if(isset($form_data['corp_name']) && !empty($form_data['corp_name']))
    <div>
        <strong>Desired name: </strong><span>@php echo html_entity_decode(htmlentities(preg_replace("/\r\n|\r|\n/",'<br/>',$form_data['corp_name']))) @endphp</span>
    </div>
@endif
@if(isset($form_data['company_name_option_2']) && !empty($form_data['company_name_option_2']))
    <div>
        <strong>Option 2: </strong><span>@php echo html_entity_decode(htmlentities(preg_replace("/\r\n|\r|\n/",'<br/>',$form_data['company_name_option_2']))) @endphp</span>
    </div>
@endif
@if(isset($form_data['type']) && !empty($form_data['type']))
    <div>
        <strong>Type: </strong><span>@php echo \App\SearchRequestType::where('id',$form_data['type'])->first()->name; @endphp</span>
    </div>
@endif
@if(isset($form_data['entity_time']) && !empty($form_data['entity_time']))
    <div>
        <strong>When are you looking to form this new entity?: </strong><span>{{$form_data['entity_time']}}</span>
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