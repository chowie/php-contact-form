<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AddMessage;
use App\Models\Message;

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

        return response()->json(['created' => true]);
    }
}
