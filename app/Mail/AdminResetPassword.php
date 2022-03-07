<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AdminResetPassword extends Mailable
{
    use Queueable, SerializesModels;
    protected $data = [];

    /**
     * Create a new message instance.
     *
     * @param array $data
     */
    public function __construct(Array $data)
    {
        $this->data=$data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mails/reset_admin_password')
            ->subject('Reset Admin Account')
            ->with('data',$this->data);
    }
}
