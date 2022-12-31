<?php

namespace  Model;

class Usuario extends ActiveRecord {

    //Base de datos
    protected static $tabla = 'usuarios';
    protected static $columnasDB = ['id', 'nombre', 'apellido', 'email', 'password', 'telefono', 'admin', 'confirmado', 'token'];

    public $id;
    public $nombre;
    public $apellido;
    public $email;
    public $password;
    public $telefono;
    public $admin;
    public $confirmado;
    public $token;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
        $this->admin = $args['admin'] ?? '0';
        $this->confirmado = $args['confirmado'] ?? '0';
        $this->token = $args['token'] ?? '';

    }

    //Mensaje de validación para la creación de una cuenta

    public function validarNuevaCuenta() {
        if(!$this->nombre) {
            self::$alertas['error'][] ='Es necesario su Nombre(s)';

        }

        if(!$this->apellido) {
            self::$alertas['error'][] ='Es necesario su apellido';
       }

        if(!$this->email) {
            self::$alertas['error'][] ='Es necesario el E-mail';
        }

        if(!$this->password) {
            self::$alertas['error'][] ='El password es importante';
        }
        if(strlen($this->password) <6){
            self::$alertas['error'] [] = 'Password: por lo menos Seis caracteres';
        }
        return self::$alertas;
    }

    public function validarLogin() {
        if(!$this->email ) {
            self::$alertas['error'] [] = 'El mail es Obligatorio';
        }
        if(!$this->password ) {
            self::$alertas['error'] [] = 'El Password es Obligatorio';
    } 

        return self::$alertas;
    }

    public function validarEmail() {
        if(!$this->email ) {
            self::$alertas['error'] [] = 'El mail es Obligatorio';
        }
        return self::$alertas;
               
    }

    //Revisar si usuario ya existe
    public function existeUsuario() {
        $query = "SELECT * FROM " . self::$tabla . " WHERE email = '" . $this->email ."' LIMIT 1";

        $resultado = self::$db->query($query);

        if($resultado->num_rows) {
            self::$alertas['error'][] = "El Usuario ya esta registrado";
        }

        return $resultado;

        }

        public function hashPassword() {
            $this->password = password_hash($this->password, PASSWORD_BCRYPT);
        }

        public function crearToken() {
            $this->token = uniqid();
        }

        public function comprobarPasswordAndVerificado ($password) {
            //debuguear($this);
            $resultado = password_verify($password, $this->password ?? '');
            

            if(!$resultado || !$this->confirmado) {
                self::$alertas['error'][] = 'Password Incorrecto o tu cuenta no ha sido confirmada';
            } else {
                return true;
            }
        }

}