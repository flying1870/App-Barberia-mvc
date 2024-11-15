<?php 

namespace Model;

class Servicio extends ActiveRecord {
    // Base de datos
    protected static $tabla = 'servicios';
    protected static $columnasDB = ['id', 'nombre', 'precio'];

    public $id;
    public $nombre;
    public $precio;

    // Array to store alert messages
    protected static $alertas = ['error' => [], 'success' => []];

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->precio = $args['precio'] ?? '';
    }

    // Validate service data
    public function validar() {
        if (!$this->nombre) {
            self::$alertas['error'][] = 'El Nombre del Servicio es Obligatorio';
        }
        if (!$this->precio) {
            self::$alertas['error'][] = 'El Precio del Servicio es Obligatorio';
        }
        if (!is_numeric($this->precio)) {
            self::$alertas['error'][] = 'El precio no es válido';
        }

        return self::$alertas;
    }

    // Optional: Method to get alerts
    public static function getAlertas() {
        return self::$alertas;
    }
}
