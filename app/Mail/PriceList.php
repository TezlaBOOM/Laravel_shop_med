<?php

namespace App\Mail;

use App\Models\Category;
use App\Models\HistoryPrice;
use App\Models\Product;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PriceList extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;
    public $startDate;
    public $endDate;
    public $messageContent;


    /**
     * Create a new message instance.
     */
    public function __construct($subject, $messageContent,$startDate,$endDate)
    {

        $this->subject = $subject;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->messageContent = $messageContent;

    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->subject,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.pricelist',
        );
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
