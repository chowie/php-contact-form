@component('mail::message')
Hi, Guy!

Message from {{$message->name}}\
@if(!empty($message->phone)) Phone: {{$message->phone}}<br> @endif
_(Received: {{$message->created_at}})_

{{$message->message}}


@endcomponent
