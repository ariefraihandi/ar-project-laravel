<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $user;

    public function __construct($user, $token)
    {
        $this->user = $user;
        $this->token = $token;
    }
    
    public function build()
    {
        // Tentukan URL berdasarkan lingkungan (local atau production)
        $verificationURL = "https://ariefraihandi.biz.id";
        
        return $this->subject('Verifikasi Pendaftaran')
                    ->view('Emails.welcome', [
                        'verificationURL' => $verificationURL,
                        'token' => $this->token,
                    ]);
    }
    

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}


