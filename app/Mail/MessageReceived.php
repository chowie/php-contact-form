<?php

namespace App\Mail;

use App\Models\Message;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MessageReceived extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Email message to be sent
     *
     * @var \App\Models\Message
     */
    public $message;

    /**
     * Create a new message instance.
     *
     * @param \App\Models\Message $message
     *
     * @return void
     */
    public function __construct(Message $message)
    {
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->message->address, $this->message->name)
            ->markdown('mail.guy');
    }
}
