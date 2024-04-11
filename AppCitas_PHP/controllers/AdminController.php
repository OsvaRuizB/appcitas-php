<?php

namespace Controllers;

use Model\AdminCita;
use MVC\Router;

function isAdmin() : void {
    if(!isset($_SESSION)) {
        session_start();
    } elseif(!isset($_SESSION['login'])) {
        header('Location: /');
    }
}

class AdminController{
    public static function index( Router $router ){
       // session_start();
      
        isAdmin();

        $fecha = $_GET['fecha'] ??  $fecha = date('Y-m-d');
        $fechas = explode('-', $fecha);

        if ( !checkdate ($fechas[1], $fechas[2], $fechas[0]) ) {
            header('location: /404');
        }



        //consultar la base de datos
        $consulta = "SELECT citas.id, citas.hora, CONCAT( usuarios.nombre, ' ', usuarios.apellido) as cliente, ";
        $consulta .= " usuarios.email, usuarios.telefono, servicios.nombre as servicio, servicios.precio  ";
        $consulta .= " FROM citas  ";
        $consulta .= " LEFT OUTER JOIN usuarios ";
        $consulta .= " ON citas.usuarioId=usuarios.id  ";
        $consulta .= " LEFT OUTER JOIN citasServicios ";
        $consulta .= " ON citasServicios.citaId=citas.id ";
        $consulta .= " LEFT OUTER JOIN servicios ";
        $consulta .= " ON servicios.id=citasServicios.servicioId ";
        $consulta .= " WHERE fecha =  '{$fecha}' ";

       $citas = AdminCita::SQL($consulta);

       

        $router->render('admin/index', [
            'nombre' => $_SESSION['nombre'],
            'citas' => $citas,
            'fecha' => $fecha
        ]);

    }
}