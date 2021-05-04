

@component('mail::message')
#CAPEX REQUEST RECEIVED

Hello, There is a request titled <b>{{$title}}</b> received from <b>{{$gen}}</b>.

@component('mail::panel')
@component('mail::table')

|                                             APPROVAL SLIP                                                |  
| ------------------------|:------------------------------------------------------------------------------:| 
| DATE INITIATED          | {{ \Carbon\Carbon::parse($created_at)->format('d/m/Y h:i A')}}                 |
| REFERENCE ID :          | {{$ref}}/{{$ref2}}/{{$ref3}}                                                   | 
| TITLE                   | {{$title}}                                                                     |
| QUANTITY                | {{$quantity}}                                                                  | 
...and more
@endcomponent
@endcomponent

@component('mail::button', ['url' => url('approvals/capexapproval/'.$id)])
VIEW
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
