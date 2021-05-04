

@component('mail::message')
#DEALER ENROLMENT APPROVED

Hello {{$gen}}, Your  Dealer enrolment for {{$location}} has been approved.

@component('mail::panel')
@component('mail::table')

|                                             APPROVAL SLIP                                                |  
| ------------------------|:------------------------------------------------------------------------------:| 
| DATE APPROVED           | {{ \Carbon\Carbon::parse($updated_at)->format('d/m/Y h:i A')}}                 |
| REFERENCE ID :          | {{$ref}}/{{$ref2}}/{{$ref3}}                                                   | 
| NAME OF THE DEALER      | {{$location}}                                                                  |
| ADDRESS                 | {!!html_entity_decode($vendorcode)!!}                                          | 
...and more
@endcomponent
@endcomponent

@component('mail::button', ['url' => url('status/dealerapproval/' . $id)])
CHECK THE STATUS
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
