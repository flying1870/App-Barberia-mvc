<?php

namespace Controllers;

use Model\AdminCita;
use MVC\Router;

class AdminController {
    public static function index(Router $router) {
        session_start();

        // Verificar que la función isAdmin existe
        if (!function_exists('isAdmin')) {
            error_log("Error: La función isAdmin no está definida.");
            header('Location: /404');
            exit();
        }

        isAdmin(); // Verificar permisos de administrador

        // Validación de la fecha
        $fecha = $_GET['fecha'] ?? date('Y-m-d');
        $fechas = explode('-', $fecha);

        if (!checkdate($fechas[1], $fechas[2], $fechas[0])) {
            error_log("Error: Fecha no válida - $fecha");
            header('Location: /404');
            exit();
        }

        // Log para verificar el acceso y la fecha
        error_log("Acceso a AdminController::index con fecha $fecha");

        // Construcción de consulta SQL
        $consulta = "SELECT citas.id, citas.hora, CONCAT(usuarios.nombre, ' ', usuarios.apellido) AS cliente, ";
        $consulta .= "usuarios.email, usuarios.telefono, servicios.nombre AS servicio, servicios.precio ";
        $consulta .= "FROM citas ";
        $consulta .= "LEFT OUTER JOIN usuarios ON citas.usuarioId = usuarios.id ";
        $consulta .= "LEFT OUTER JOIN citasServicios ON citasServicios.citaId = citas.id ";
        $consulta .= "LEFT OUTER JOIN servicios ON servicios.id = citasServicios.servicioId ";
        $consulta .= "WHERE fecha = :fecha";

        // Ejecutar consulta SQL
        $citas = AdminCita::SQL($consulta, [':fecha' => $fecha]) ?? [];

        // Verificar que los resultados de la consulta no estén vacíos
        if (empty($citas)) {
            error_log("Advertencia: No se encontraron citas para la fecha $fecha.");
        }

        // Renderizar la vista
        $router->render('admin/index', [
            'nombre' => $_SESSION['nombre'] ?? 'Usuario',
            'citas' => $citas,
            'fecha' => $fecha
        ]);
    }
}
