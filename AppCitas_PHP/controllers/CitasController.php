<?php
namespace Controllers;

use MVC\Router;

function isAuth() : void {
    if(!isset($_SESSION)) {
        session_start();
    } elseif(!isset($_SESSION['login'])) {
        header('Location: /');
    }
}
class CitasController {
    public static function index( Router $router){

        //session_start();
       
        isAuth();

        $router->render('cita/index', [
            'nombre' => $_SESSION['nombre'],
            'id' => $_SESSION['id']
        ]);
    }
}

?>
