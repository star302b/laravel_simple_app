<div>
    <h3>Dear LEGALBOX, there is a new Free Look Up request</h3>
</div>
@if(isset($form_data['entity_name']) && !empty($form_data['entity_name']))
    <div>
        <strong>Entity Name: </strong><span>{{$form_data['entity_name']}}</span>
    </div>
@endif
@if(isset($form_data['entity_ending']) && !empty($form_data['entity_ending']))
    <div>
        <strong>Entity Ending: </strong><span>{{$form_data['entity_ending']}}</span>
    </div>
@endif

@if(isset($form_data['data_of_formation']) && !empty($form_data['data_of_formation']))
    <div>
        <strong>Date of formation: </strong><span>{{$form_data['data_of_formation']}}</span>
    </div>
@endif
@if(isset($form_data['county_of_formation']) && !empty($form_data['county_of_formation']))
    <div>
        <strong>County of formation: </strong><span>{{$form_data['county_of_formation']}}</span>
    </div>
@endif

@if(isset($form_data['contact_name']) && !empty($form_data['contact_name']))
    <div>
        <strong>Name: </strong><span>{{$form_data['contact_name']}}</span>
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
@if(isset($ip_address) && !empty($ip_address))
    <div>
        <strong>Ip Address: </strong><span>{{ str_replace('.','-',$ip_address) }}</span>
    </div>
@endif