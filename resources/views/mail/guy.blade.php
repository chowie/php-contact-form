@component('mail::message')
Hi, Guy!

Message from {{$message->name}}\
@if(!empty($message->phone)) Phone: {{$message->phone}}<br> @endif
_(Received: {{\Carbon\Carbon::parse($message->created_at)->isoFormat('LLLL')}})_

{{$message->message}}


@endcomponent
