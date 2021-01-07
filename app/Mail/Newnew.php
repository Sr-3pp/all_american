<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Newnew extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $new)
    {
        $this->user = $user;
        $this->new = $new;
    } 

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
    $new = $this->new;
    $user = $this->user; 
    return $this->view('email.Newnew', compact('new', 'user'));
    }
}
