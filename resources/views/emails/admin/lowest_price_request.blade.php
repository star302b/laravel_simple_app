<div>
    <h3>Dear USACORP, there is a new Lowest Price Match request</h3>
</div>
@if(isset($form_data['service']) && !empty($form_data['service']))
    <div>
        <strong>Service: </strong><span>{{\App\Service::where('id',$form_data['service'])->first()->name}}</span>
    </div>
@endif
@if(isset($form_data['state']) && !empty($form_data['state']))
    <div>
        <strong>State: </strong><span>{{\App\State::where('id',$form_data['state'])->first()->name}}</span>
    </div>
@endif

@if(isset($form_data['county']) && !empty($form_data['county']))
    <div>
        <strong>County: </strong><span>{{$form_data['county']}}</span>
    </div>
@endif

@if(isset($form_data['rate']) && !empty($form_data['rate']))
    <div>
        <strong>Rate offered by that company: </strong><span>{{$form_data['rate']}}</span>
    </div>
@endif

@if(isset($form_data['company']) && !empty($form_data['company']))
    <div>
        <strong>That company’s name: </strong><span>{{$form_data['company']}}</span>
    </div>
@endif
@if(isset($form_data['comment']) && !empty($form_data['comment']))
    <div>
        <strong>Notes / Comments: </strong><p>@php echo html_entity_decode(htmlentities(preg_replace("/\r\n|\r|\n/",'<br/>',$form_data['comment']))) @endphp</p>
    </div>
@endif
@if(isset($form_data['name']) && !empty($form_data['name']))
    <div>
        <strong>Name: </strong><span>{{$form_data['name']}}</span>
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
@if(isset($form_data['company_applicable']) && !empty($form_data['company_applicable']))
    <div>
        <strong>Company name (if applicable): </strong><span>{{$form_data['company_applicable']}}</span>
    </div>
@endif
@if(isset($ip_address) && !empty($ip_address))
    <div>
        <strong>Ip Address: </strong><span>{{ str_replace('.','-',$ip_address) }}</span>
    </div>
@endif