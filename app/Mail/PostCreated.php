<?php

namespace App\Mail;

use App\Models\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PostCreated extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        private readonly Post $post
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Post Created',
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'emails.posts.created',
            with: ['post' => $this->post]
        );
    }
}
