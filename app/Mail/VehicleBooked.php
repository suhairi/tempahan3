<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class VehicleBooked extends Mailable
{
    use Queueable, SerializesModels;

    protected $approver;
    protected $applicant, $destination;

    /**
     * Create a new message instance.
     */
    public function __construct(User $approver, $data)
    {
        $this->approver = $approver;
        $this->applicant = $data['name'];
        $this->destination = $data['destination'];
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Vehicle Booked',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'mail.vehicle.booked',
            with: [
                'name'          => $this->approver->name,
                'email'         => $this->approver->email,
                'url'           => env('APP_URL'),
                'applicant'     => $this->applicant,
                'destination'   => $this->destination,
            ],
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
