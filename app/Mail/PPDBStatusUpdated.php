<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PPDBStatusUpdated extends Mailable
{
    use Queueable, SerializesModels;
    protected $status;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($status)
    {
        $this->status = $status;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('ppdb.mail')
        ->subject("PPDB SMPN 1 Sindangkerta")
        ->with([
            'status' => $this->status,
        ]);;
    }
}
