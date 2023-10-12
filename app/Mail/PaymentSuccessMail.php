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

    /**
     * Create a new message instance.
     *
     * @param  \App\Models\PembelianMakalah  $pembelian
     * @return void
     */
    public function __construct($pembelian)
    {
        $this->pembelian = $pembelian;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.payment-success')
            ->with(['pembelian' => $this->pembelian])
            ->subject('Payment Success');
    }
}
