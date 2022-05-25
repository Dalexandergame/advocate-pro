<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AccessMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @param $emails
     * @return void
     */
        protected $email;


    /**
     * Create a new message instance.
     *
     * @param $password
     * @return void
     */
        protected $password;

    public function __construct($email,$password)
    {
        $this->email = $email;
        $this->password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.access')
                    ->with([
                        'email' => $this->email,
                        'password' => $this->password
                    ]);
    }
}
