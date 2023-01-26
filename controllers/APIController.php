<?php 

namespace Controllers;

use Model\Servicio;

class APIController {
    public static function index() {
        $servicios = Servicio::all(); 
    //debuguear($servicios);
        echo json_encode($servicios);
    }

    public static function guardar() {
        $respuesta = [
            'mensaje' => 'Todo ok'
        ];

        echo json_encode($respuesta);
    }
}