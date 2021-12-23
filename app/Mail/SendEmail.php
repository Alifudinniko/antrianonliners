<?php

namespace App\Mail;

use App\Mail\SendEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {


        return  $this->from('m.rozaki099@gmail.com')
            ->view('email')
            ->with(
                [
                    'nama' => 'Antrian RS',
                    'website' => 'AntrianRS.com',
                ]
            );
    }
}
