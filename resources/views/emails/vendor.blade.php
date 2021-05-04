

@component('mail::message')
#VENDOR REQUEST APPROVED

Hello {{$gen}}, Your  Vendor request for {{$vendorcode}} has been approved.

@component('mail::panel')
@component('mail::table')

|                                             APPROVAL SLIP                                                |  
| ------------------------|:------------------------------------------------------------------------------:| 
| DATE APPROVED           | {{ \Carbon\Carbon::parse($updated_at)->format('d/m/Y h:i A')}}                 |
| REFERENCE ID :          | {{$ref}}/{{$ref2}}/{{$ref3}}                                                   | 
| LOCATION                | {{$location}}                                                                  |
| VENDOR CODE             | {{$vendorcode}}                                                                | 
...and more
@endcomponent
@endcomponent

@component('mail::button', ['url' => url('status/vendorapproval/' . $id)])
CHECK THE STATUS
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
