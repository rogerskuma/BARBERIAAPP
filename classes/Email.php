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
        $mail = new PHPMailer(true);

        $mail->isSMTP();
        $mail->Host = 'smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = '0977063d65a919';
        $mail->Password = '6bf5e4a6195e1d';

        $mail->setFrom('duranroy@msn.com', 'Mailer');
        $mail->addAddress('duranroy@msn.com', 'Mailer');
        $mail->Subject = 'Confirma tu cuenta';

        //Set HTML

        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';

        $contenido = '<html>';
        $contenido .= "<p><strong>Hola " . $this->nombre . "</strong> Has creado tu cuenta en BarberiaApp, confirma presionando el siguiente enlace</p>";
        $contenido .= "<p>Presiona aquí: <a href='http://localhost:3000/confirmar-cuenta?token=" . $this->token . "'>Confirmar Cuenta</a>"; 
        $contenido .= "<p> Si tu no solicitaste esta cuenta, puedes ignorar el mensaje</p>";
        $contenido .= '</html>';

        $mail->Body = $contenido;

        //Enviar el mail 
        $mail->send();

    }

    public function enviarInstrucciones() {
        $mail = new PHPMailer(true);

        $mail->isSMTP();
        $mail->Host = 'smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = '0977063d65a919';
        $mail->Password = '6bf5e4a6195e1d';

        $mail->setFrom('duranroy@msn.com', 'Mailer');
        $mail->addAddress('duranroy@msn.com', 'Mailer');
        $mail->Subject = 'Restablecer tu password';

        //Set HTML

        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';

        $contenido = '<html>';
        $contenido .= "<p><strong>Bienvenido " . $this->nombre . "</strong> Has solicitado restablecer tu password , sigue el siguiente enlace por favor</p>";
        $contenido .= "<p>Presiona aquí: <a href='http://localhost:3000/recuperar?token=" . $this->token . "'>Restablecer Password</a>"; 
        $contenido .= "<p> Si tu no solicitaste este restablecimiento de password, ignora el mensaje</p>";
        $contenido .= '</html>';

        $mail->Body = $contenido;

        //Enviar el mail 
        $mail->send();   
    }
}
