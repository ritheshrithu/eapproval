

@component('mail::message')
#CREDIT REQUEST APPROVED

Hello {{$gen}}, Your request for {{$title}} has been approved.

@component('mail::panel')
@component('mail::table')

|                                             APPROVAL SLIP                                                |  
| ------------------------|:------------------------------------------------------------------------------:| 
| DATE APPROVED           | {{ \Carbon\Carbon::parse($updated_at)->format('d/m/Y h:i A')}}                 |
| REFERENCE ID :          | {{$ref}}/CREDIT/{{$ref3}}                                                      | 
| NAME OF THE DEALER      | {{$title}}                                                                     |
| ADDRESS                 | {{$address}}                                                                   | 
...and more
@endcomponent
@endcomponent

@component('mail::button', ['url' => url('status/creditapproval/' . $id)])
CHECK THE STATUS
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
