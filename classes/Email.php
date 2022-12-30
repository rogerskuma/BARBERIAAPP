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
        $mail->isSMTP();
        $mail->Host = 'outlook.office365.com';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = 'duranroy@msn.com';
        $mail->Password = 'Alic#0509#';

        $mail->setFrom('duranroy@msn.com', 'Mailer');
        $mail->addAddress('duranroy@msn.com', 'Mailer');
        $mail->Subject = 'Confirma tu cuenta';

        //Set HTML

        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';

        $contenido = "<html>";
        $contenido .= "<p><strong>Hola " . $this->nombre . "</strong> Has creado tu cuenta en BarberiaApp, confirma presionando el siguiente enlace</p>";
        $contenido .= "<p>Presiona aquí: <a href='http://localhost:3000/confirmar-cuenta?token=" . $this->token ."'>Confirmar Cuenta</a> </p>"; 
        $contenido .= "<p> Si tu no solicitaste esta cuenta, puedes ignorar el mensaje</p>";
        $contenido .= "</html>";

        $mail->Body = $contenido;

        //Enviar el mail 
        $mail->send();
    }
}
