<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CorreoRegistro extends Mailable
{
    use Queueable, SerializesModels;

    public $nombre;
    public $app;
    public $apm;
    public $usuario;
    public $contrasena;

    public function __construct($nombre, $app, $apm, $usuario, $contra)
    {
        $this->nombre = $nombre;
        $this->app = $app;
        $this->apm = $apm;
        $this->usuario = $usuario;
        $this->contrasena = $contra;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.RegistroLatter');
    }
}
