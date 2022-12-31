<?php
namespace Controllers;

use Classes\Email;
use Model\Usuario;
use MVC\Router;

class LoginController {
    public static function login( Router $router ) {
        $alertas = [];
        

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $auth = new  Usuario($_POST);

            $alertas = $auth->validarLogin();
            //debuguear($auth);

            if(empty($alertas)) {
                //Comprobar que exista el usuario
                $usuario = Usuario::where('email', $auth->email);

                if($usuario) {
                    //verificar el password 
                    if( $usuario->comprobarPasswordAndVerificado($auth->password) ) {
                        // Autenticar al usuario 479
                        session_start();
                        $_SESSION['id'] = $usuario->id;
                        $_SESSION['nombre'] = $usuario->nombre . " " . $usuario->apellido;
                        $_SESSION['email'] = $usuario->email;
                        $_SESSION['login'] = true;

                        // Redireccionamiento

                        if($usuario->admin === "1") {
                            $_SESSION['admin'] = $usuario->admin ?? null;
                            header('Location: /admin');
                        } else
                          header('Location: /cita');
                        }
                        }else {
                        Usuario::setAlerta('error', 'Usuario no encontrado');
                }
            }
        }


        $alertas = Usuario::getAlertas();
        $router->render('auth/login', [
            'alertas' => $alertas

        ]);

    }

    public static function logout() {
        echo "Desde logout";
    }

    public static function olvide(Router $router) {
            $alertas = [];

            if($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $auth = new  Usuario($_POST);
                    $alertas = $auth->validarEmail();

                    if(empty($alertas)) {
                        $usuario = Usuario::where('email', $auth->email);
                            if($usuario && $usuario->confirmado === "1") {
                                //generar un token
                                $usuario->crearToken();
                                $usuario->guardar();

                             //   TODO: Enviar el mail
                            Usuario::setAlerta('exito', 'Revisa tu email');
                            }else {
                            Usuario::setAlerta('error', 'El usuario no existe o no esta confirmado');
                            }
                    }
            }
            $alertas = Usuario::getAlertas();
        $router->render('auth/olvide-password', [
                'alertas' => $alertas
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

    public static function confirmar(Router $router) {
        $alertas = [];

        $token =  s($_GET['token']);

        $usuario = Usuario::where('token', $token);

        if(empty($usuario)) {
            //mostrar mensaje de error
            Usuario::setAlerta('error', 'Token No Válido');
        } else {
            //Modificar a usuario confirmado
            $usuario->confirmado = "1";
            $usuario->token = null;
            $usuario->guardar();
            //debuguear($usuario);
            Usuario::setAlerta('exito', 'Tu cuenta ha sido activada correctamente');
        }
        //Obtener alertas
        $alertas = Usuario::getAlertas();
        //Renderizar la vista
        $router->render('auth/confirmar-cuenta', [
                'alertas' => $alertas
        ]);
    }
}