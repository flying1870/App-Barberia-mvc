<?php 

namespace Controllers;

use MVC\Router;

class CitaController {
    public static function index(Router $router) { 
        session_start();

        // Use isset() to provide default values if session variables are not set
        $nombre = isset($_SESSION['nombre']) ? $_SESSION['nombre'] : '';
        $id = isset($_SESSION['id']) ? $_SESSION['id'] : '';

        $router->render('cita/index', [
            'nombre' => $nombre,
            'id' => $id,
        ]);
    }
}
