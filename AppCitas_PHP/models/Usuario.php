<?php

namespace Model;
class Usuario extends ActiveRecord{
    //base de datos 
    protected static $tabla = 'usuarios';
    protected static $columnasDB = ['id', 'nombre','apellido','email',
    'password','telefono','admin','confirmado','token'];

    public $id;
    public $nombre;
    public $apellido;
    public $email;
    public $password;
    public $telefono;
    public $admin;
    public $confirmado;
    public $token;

    public function __construct($arg = []) {
        $this->id = $arg['id'] ?? null;
        $this->nombre = $arg['nombre'] ?? '';
        $this->apellido = $arg['apellido'] ?? '';
        $this->email = $arg['email'] ?? '';
        $this->password = $arg['password'] ?? '';
        $this->telefono = $arg['telefono'] ?? '';
        $this->admin = $arg['admin'] ?? 0;
        $this->confirmado = $arg['confirmado'] ?? 0;
        $this->token = $arg['token'] ?? '';
    }

    //Mensaje de validacion para la creacion de una cuenta 
    public function validarNuevaCuenta(){
        if(!$this->nombre){
            self::$alertas['error'][] = 'EL Nombre es Obligatorio';
        }
        if(!$this->apellido){
            self::$alertas['error'][] = 'EL Apellido es Obligatorio';
        }
        if(!$this->email){
            self::$alertas['error'][] = 'EL Email es Obligatorio';
        }
        if(!$this->password){
            self::$alertas['error'][] = 'EL Password es Obligatorio';
        }
        if(strlen($this->password) < 6){
            self::$alertas['error'][] = 'EL password debe contener al menos 6 caracteres';
        }
        return self::$alertas;
    } 
    
    public function validarLogin(){
        if(!$this->email){
            self::$alertas['error'][] = 'El email es Obligatorio';
        }
        if(!$this->password){
            self::$alertas['error'][] = 'El Password es Obligatorio';
        }
        return self::$alertas;
    }

    public function validarEmail() {
        if(!$this->email){
            self::$alertas['error'][] = 'El email es Obligatorio';
        }
        return self::$alertas;
    }
    public function validarPassword() {
        if(!$this->password){
            self::$alertas['error'][] = 'El Password es Obligatorio';
        }
        if(strlen($this->password) < 6){
            self::$alertas['error'][] = 'EL password debe contener al menos 6 caracteres';
        }
        return self::$alertas;
    }



    //Revisa si el usuario ya existe 
    public function existeUsuario() {
        $query = " SELECT * FROM " . self::$tabla . " WHERE email = '" . $this->email . "' LIMIT 1";
        
        $resultado = self::$db->query($query);
        if($resultado->num_rows) {
            self::$alertas['error'][] = 'El Usuario ya esta registrado';
        }
        return $resultado;
    }

    public function hashPassword() {
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);
    }

    public function crearToken() {
        $this->token = uniqid();
    }
    public function comprobarPasswordAndVerificado($password){
        $resultado = password_verify($password, $this->password);

        if(!$resultado || !$this->confirmado){
            self::$alertas['error'][]= 'Password Incorrerto o tu cuenta no ha sido confirmada';
        }else {
            return true;
        }
    }
}

