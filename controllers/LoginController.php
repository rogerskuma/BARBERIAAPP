<?php
namespace Controllers;

use Classes\Email;
use Model\Usuario;
use MVC\Router;

class LoginController {
    public static function login( Router $router ) {
        $router->render('auth/login');

    }

    public static function logout() {
        echo "Desde logout";
    }

    public static function olvide(Router $router) {
        $router->render('auth/olvide-password', [

        ]);
    }

    public static function recuperar() {
        echo "recuperar";
    }

    public static function crear(Router $router) {
        $usuario = new Usuario;

        //Alertas vacias
        $alertas = [];
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $usuario->sincronizar($_POST);
            $alertas = $usuario->validarNuevaCuenta();
            
            //Revisar que alerta este vacio
            if(empty($alertas)) {
                //Verificar que el usuario no este registrado
                $resultado = $usuario->existeUsuario();

                if($resultado->num_rows) {
                    $alertas = Usuario::getAlertas();
                } else {
                    //Hashear el password
                    $usuario->hashPassword(); 
                    //"No esta registrado"
                    
                    //Generar un Token único
                    $usuario->crearToken();

                    //Enviar el email

                    $email = new Email($usuario->nombre, $usuario->email, $usuario->token);
                    $email->enviarConfirmacion();

                    // Crear el usuario
                    $resultado = $usuario->guardar();
                    if($resultado) {
                    }
                    if($resultado) {
                        header('Location: /mensaje');
                    }
                    //debuguear($email);
                    // debuguear($usuario);
                }
            }     
        }


        $router->render('/auth/crear-cta' , [
            'usuario' => $usuario,
            'alertas' => $alertas
        ]); 
    }

    public static function mensaje(Router $router) {

            $router->render('auth/mensaje');
    }
}