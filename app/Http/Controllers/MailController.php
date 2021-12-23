<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SendEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Mail\Mailable;

class MailController extends Controller
{
    public function kirim_email()
    {

        Mail::to("m.rozaki099@gmail.com")->send(new SendEmail());

        echo "Antrian sudah dipanggil ! check your inbox";
    }
    public function notifantrian()
    {
    }
}
