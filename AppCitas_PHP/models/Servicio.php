<?php

namespace Model;

class Servicio extends ActiveRecord {
    //Base de datos configuracion 
    protected static $tabla = 'servicios';
    protected static $columnasDB = ['id', 'nombre','precio'];

    public $id;
    public $nombre;
    public $precio;

    public function __construct($arg = [])
    {
        $this->id = $arg['id'] ?? null;
        $this->nombre = $arg['nombre'] ?? '';
        $this->precio = $arg['precio'] ?? '';
    }

    public function validar() {
        if(!$this->nombre) {
            self::$alertas['error'][] = 'El nombre del Servicio es obligatorio';
        }
        if(!$this->precio) {
            self::$alertas['error'][] = 'El precio del Servicio es obligatorio';
        }
        if(!is_numeric($this->precio)) {
            self::$alertas['error'][] = 'El precio no es válido';
        }

        return self::$alertas;
    }
}
?>