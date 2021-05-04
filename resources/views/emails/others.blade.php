

@component('mail::message')
# REQUEST APPROVED

Hello {{$gen}}, Your request for {{$title}} has been approved.

@component('mail::panel')
@component('mail::table')

|                                             APPROVAL SLIP                                                |  
| ------------------------|:------------------------------------------------------------------------------:| 
| DATE APPROVED           | {{ \Carbon\Carbon::parse($updated_at)->format('d/m/Y h:i A')}}                 |
| REFERENCE ID :          | {{$ref}}/{{$ref2}}/{{$ref3}}                                                   | 
| ITEM                    | {{$title}}                                                                     |
| COMMITMENT              | {{$sub}}                                                                       | 
| {!!html_entity_decode($des)!!}                                                                           |
@endcomponent
@endcomponent

@component('mail::button', ['url' => url('status/otherapproval/' . $id)])
CHECK THE STATUS
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
