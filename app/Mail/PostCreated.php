<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Post;

class PostCreated extends Mailable
{
    use Queueable, SerializesModels;

    protected $post = null;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Post $post)
    {
        // dove cercare di soddisfare tutte le dipendenze
        // qui post l'abbiamo inserito internamente
        $this->post = $post;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // qui il post lo inviamo alla view, mettendolo in una variabile $post e mettendo il compact
        $post = $this->post;
        return $this->view('mail.post-created', compact('post'));
    }
}
