<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotVerifiedFileEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $verificationURL;

    public function __construct($verificationURL)
    {
        $this->verificationURL = $verificationURL;
    }

    public function build()
    {
        return $this->subject('Verifikasi Makalah Gagal')
                    ->view('Emails.userUploadfile');
    }
}
