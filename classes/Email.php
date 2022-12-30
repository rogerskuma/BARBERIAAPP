<?php
namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;

class Email {

    public $email;
    public $nombre;
    public $token;

    public function __construct($email, $nombre, $token) 
    {
            $this->email = $email;
            $this->nombre = $nombre;
            $this->token = $token;
    }

    public function enviarConfirmacion() {
        //Crear el objeto de email
        $mail = new PHPMailer();
    }
}
