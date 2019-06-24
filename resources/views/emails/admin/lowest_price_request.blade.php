<div>
    <h3>Dear LEGALBOX, there is a new Lowest Price Match request</h3>
</div>
@if(isset($form_data['entity_name_ending']) && !empty($form_data['entity_name_ending']))
    <div>
        <strong>Entity Name & Ending: </strong><span>{{$form_data['entity_name_ending']}}</span>
    </div>
@endif
@if(isset($form_data['county']) && !empty($form_data['county']))
    <div>
        <strong>County: </strong><span>{{$form_data['county']}}</span>
    </div>
@endif
@if(isset($form_data['price']) && !empty($form_data['price']))
    <div>
        <strong>Price quote you received: </strong><span>{{$form_data['price']}}</span>
    </div>
@endif
@if(isset($form_data['quote']) && !empty($form_data['quote']))
    <div>
        <strong>Was this quote for the above entity name and county? </strong><span>{{$form_data['quote']}}</span>
    </div>
@endif
@if(isset($form_data['asurred']) && !empty($form_data['asurred']))
    <div>
        <strong>Were you assured the 3 items below:</strong><span>{{$form_data['asurred']}}</span>
    </div>
@endif
@if(isset($form_data['name_of_company']) && !empty($form_data['name_of_company']))
    <div>
        <strong>That company’s name: </strong><span>{{$form_data['name_of_company']}}</span>
    </div>
@endif
@if(isset($form_data['comment']) && !empty($form_data['comment']))
    <div>
        <strong>Notes / Comments: </strong><p>@php echo html_entity_decode(htmlentities(preg_replace("/\r\n|\r|\n/",'<br/>',$form_data['comment']))) @endphp</p>
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