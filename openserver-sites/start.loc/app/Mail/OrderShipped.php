<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;

    protected $order;

    public function __construct($order)
    {
        $this->order = $order;
    }

    public function envelope()
    {
        return new Envelope(
            subject: 'Заказ отправлен',
        );
    }

    public function content()
    {
        return new Content(
            view: 'mail.order_created',
            with: ['order' => $this->order],
        );
    }

    public function attachments()
    {
        return [
            Attachment::fromPath('build/assets/app.8ad202b9.css'),
        ];
    }


}

