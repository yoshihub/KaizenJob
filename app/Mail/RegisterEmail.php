<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;

class RegisterEmail extends Mailable
{
    private $path;

    public function __construct(string $path)
    {
        $this->path = $path;
    }

    public function envelope()
    {
        return new Envelope(
            subject: 'KaizenJob登録メール',
        );
    }

    public function content()
    {
        return new Content(
            view: 'emails.register_email',
            with: ['path' => $this->path],
        );
    }
}
