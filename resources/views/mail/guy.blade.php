@component('mail::message')
Hi, Guy!

{{$message->message}}

{{$message->name}}\
@if(!empty($message->phone))
    {{$message->phone}}
@endif

@endcomponent
