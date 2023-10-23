<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class Newsletter extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;
    public $imagePath;
    public $alttext;
    public $messageContent;
    public $offer_url;
    public $image_url;

    /**
     * Create a new message instance.
     */
    public function __construct($subject, $imagePath, $alttext, $messageContent,$offer_url,$image_url)
    {
        $this->subject = $subject;
        $this->imagePath = $imagePath;
        $this->alttext = $alttext;
        $this->messageContent = $messageContent;
        $this->offer_url = $offer_url;
        $this->image_url = $image_url;
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
            view: 'mail.newsletter',
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
