<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewMail extends Mailable{

    use Queueable, SerializesModels;

    public $user;
    public $pontuacao;
    public $empresa;

    public function __construct($user, $pontuacao, $empresa, $nova_pontuacao){

        $this->user = $user;
        $this->pontuacao = $pontuacao;
        $this->empresa = $empresa;
        $this->nova_pontuacao = $nova_pontuacao;

    }

    public function build(){

        return $this->subject('This is Testing Mail')
                    ->view('email.test');
    }
}
