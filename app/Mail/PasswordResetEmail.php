<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PasswordResetEmail extends Mailable
{
    private $path;

    public function __construct(string $path)
    {
        $this->path = $path;
    }

    public function envelope()
    {
        return new Envelope(
            subject: 'パスワードリセットメール',
        );
    }

    public function content()
    {
        return new Content(
            view: 'emails.password_reset_email',
            with: ['path' => $this->path],
        );
    }
}
