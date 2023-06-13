<?php

namespace App\Mail;

use App\Models\Messages;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MessageReceived extends Mailable
{
    use Queueable, SerializesModels;

    public $message;

    public function __construct(Messages $message)
    {
        $this->message = $message;
    }

    public function build()
    {
        return $this->from($this->message->email, $this->message->name)
            ->view('admin.components.email')
            ->subject('New message received!')
            ->with([
                'message' => $this->message,
            ]);
    }
}