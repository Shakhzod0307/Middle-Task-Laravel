<?php

namespace App\Mail;

use App\Models\Application;
use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Attachment;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ApplicationCreated extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public Application $application;
    public function __construct(Application $application)
    {
        $this->application = $application;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: $this->application->user->email,
            subject: 'Application Created',

        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.appCreated',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */

    public function attachments(): array
    {
        if (!empty($this->application->file_url)){
            $attachment = Attachment::fromPath(storage_path('app/public/'.$this->application->file_url));return [$attachment];
        }
        else{
            return [];
        }
    }

}
