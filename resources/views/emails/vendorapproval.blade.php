

@component('mail::message')
#VENDOR REQUEST RECEIVED

Hello, There is a Vendor request for <b>{{$vendorcode}}</b> has been received from <b>{{$gen}}</b>.

@component('mail::panel')
@component('mail::table')

|                                             APPROVAL SLIP                                                |  
| ------------------------|:------------------------------------------------------------------------------:| 
| DATE INITIATED          | {{ \Carbon\Carbon::parse($created_at)->format('d/m/Y h:i A')}}                 |
| REFERENCE ID :          | {{$ref}}/{{$ref2}}/{{$ref3}}                                                   | 
| LOCATION                | {{$location}}                                                                  |
| VENDOR CODE             | {{$vendorcode}}                                                                | 
...and more
@endcomponent
@endcomponent

@component('mail::button', ['url' => url('approvals/vendorapproval/'.$id)])
VIEW
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
