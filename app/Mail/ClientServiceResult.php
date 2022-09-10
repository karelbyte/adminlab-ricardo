<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ClientServiceResult extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $data;

    public $attachs;

    public function __construct($dat)
    {
        $this->data = $dat['data'];
        $this->attachs = $dat['attachs'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
        $mail = $this->view('client_mail',['data' => $this->data])
          ->subject('RESULTADOS - LABORATORIO CLINICO INTEGRAL');

        foreach($this->attachs as $file) {
            $mail->attach($file[0], $file[1]);
        }

        return $mail;
    }
}
