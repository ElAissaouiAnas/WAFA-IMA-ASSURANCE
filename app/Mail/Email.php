<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Email extends Mailable
{
    use Queueable, SerializesModels;

    protected $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        switch ($this->data->type) {
            case 1:
                return $this->subject('Reçu de transaction - Numéro de commande #' . $this->data->id)->view('emails.1')->with([
                    'data' => $this->data,
                ]);
                break;
            case 2:
                return $this->subject('Contrat à signer - ' . $this->data->contrat->type)->view('emails.2')->with([
                    'data' => $this->data,
                ]);
                break;
            case 3:
                return $this->subject('Attestation - ' . $this->data->contrat->type)->view('emails.3')->with([
                    'data' => $this->data,
                ]);
                break;
        }
    }
}
