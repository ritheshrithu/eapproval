

@component('mail::message')
#CREDIT REQUEST RECEIVED

Hello, There is a request titled <b>{{$title}}</b> received from <b>{{$gen}}</b>.

@component('mail::panel')
@component('mail::table')

|                                             APPROVAL SLIP                                                |  
| ------------------------|:------------------------------------------------------------------------------:| 
| DATE RECEIVED           | {{ \Carbon\Carbon::parse($updated_at)->format('d/m/Y h:i A')}}                 |
| REFERENCE ID :          | {{$ref}}/CREDIT/{{$ref3}}                                                      | 
| NAME OF THE DEALER      | {{$title}}                                                                     |
| ADDRESS                 | {!!html_entity_decode($address)!!}                                             |		                                                                    
...and more
@endcomponent
@endcomponent

@component('mail::button', ['url' => url('approvals/creditapproval/'.$id)])
VIEW
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
