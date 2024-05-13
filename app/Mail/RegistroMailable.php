<?php

namespace App\Mail;

use App\Models\establecimiento;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RegistroMailable extends Mailable
{

    use Queueable, SerializesModels;
    /**
     * Create a new message instance.
     */
    public $establecimiento;

    public function __construct($establecimiento)
    {
        $this->establecimiento = $establecimiento;
    }

    public function build()
    {
        return $this->view('mails.email')
            ->with([
                'establecimiento' => $this->establecimiento,
            ]);
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('info@launionenamora.gov.co', 'Oficina de turismo'),
            subject: 'Peticion de registro',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mails.email',
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
