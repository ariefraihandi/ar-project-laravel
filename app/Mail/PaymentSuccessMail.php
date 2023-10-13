<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Collection;

class PaymentSuccessMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $pembelian;
    protected $tokenUrl;

    /**
     * Create a new message instance.
     *
     * @param  \App\Models\PembelianMakalah  $pembelian
     * @param  string  $tokenUrl
     * @return void
     */
    public function __construct($pembelian, $tokenUrl)
    {
        $this->pembelian = $pembelian;
        $this->tokenUrl = $tokenUrl;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('Emails.payment-success')
            ->with(['pembelian' => $this->pembelian, 'tokenUrl' => $this->tokenUrl])
            ->subject('Payment Success');
    }
}
