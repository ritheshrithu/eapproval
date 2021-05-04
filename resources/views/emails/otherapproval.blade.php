

@component('mail::message')
# REQUEST RECEIVED

Hello, There is a request titled <b>{{$title}}</b> received from <b>{{$gen}}</b>.

@component('mail::panel')
@component('mail::table')

|                                             APPROVAL SLIP                                                |  
| ------------------------|:------------------------------------------------------------------------------:| 
| DATE INITIATED          | {{ \Carbon\Carbon::parse($created_at)->format('d/m/Y h:i A')}}                 |
| REFERENCE ID :          | {{$ref}}/{{$ref2}}/{{$ref3}}                                                   | 
| ITEM                    | {{$title}}                                                                     |
| COMMITMENT              | {{$sub}}                                                                       | 
| {!!html_entity_decode($des)!!}                                                                           |
@endcomponent
@endcomponent

@component('mail::button', ['url' => url('approvals/otherapproval/' . $id)])
VIEW
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
