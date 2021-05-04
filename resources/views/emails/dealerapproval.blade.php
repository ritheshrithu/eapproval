

@component('mail::message')
#DEALER ENROLMENT RECEIVED

Hello, There is a Dealer Enrolment for <b>{{$location}}</b> has been received from <b>{{$gen}}</b>.

@component('mail::panel')
@component('mail::table')

|                                             APPROVAL SLIP                                                |  
| ------------------------|:------------------------------------------------------------------------------:| 
| DATE INITIATED          | {{ \Carbon\Carbon::parse($created_at)->format('d/m/Y h:i A')}}                 |
| REFERENCE ID :          | {{$ref}}/{{$ref2}}/{{$ref3}}                                                   | 
| NAME OF THE DEALER      | {{$location}}                                                                  |
| ADDRESS                 | {{html_entity_decode($vendorcode)}}                                                                                   
...and more
@endcomponent
@endcomponent

@component('mail::button', ['url' => url('approvals/dealerapproval/'.$id)])
VIEW
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
