<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddMessage;
use App\Mail\MessageReceived;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    public function store(AddMessage $request)
    {
        $validated = $request->validated();

        $message = new Message;

        $message->name = request('name');
        $message->email = request('email');
        $message->message = request('message');
        $message->phone = request('phone', null);

        $message->save();

        $to = config('mail.to');

        Mail::to($to['address'], $to['name'])->send(new MessageReceived($message));

        return response()->json(['created' => true]);
    }
}
