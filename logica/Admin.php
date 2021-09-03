<?php

require_once 'persistencia/Conec.php';
require_once 'persistencia/AdminDAO.php';

class Admin{
    
    private $id;
    private $nombre;
    private $apellido;
    private $correo;
    private $clave;
    private $administradorDAO;
    private $conexion;
    
    public function Admin($id = 0, $nombre = "", $apellido = "", $correo = "", $clave = ""){
        
        $this -> id = $id;
        $this -> nombre = $nombre;
        $this -> apellido = $apellido;
        $this -> correo = $correo;
        $this -> clave = $clave;
        $this -> conexion = new Conec();
        $this -> administradorDAO = new AdminDAO( $this -> id, $this -> nombre,$this -> apellido, $this -> correo, $this -> clave);
        
    }
    
    public function getId()
    {
        return $this->id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getApellido()
    {
        return $this->apellido;
    }

    public function getCorreo()
    {
        return $this->correo;
    }

    public function getClave()
    {
        return $this->clave;
    }

 
    
    public function autenticar(){
        
        $this -> conexion -> Abrir();
        $this -> conexion -> ejecutar($this -> administradorDAO -> Autenticar());
        
        if($this -> conexion -> numfilas()==0){
            return FALSE;
        }else{
            
            $resultado = $this -> conexion ->extraer();
            $this -> id = $resultado[0];
            return TRUE;
        }
    }
    
    public function consultar(){
        $this -> conexion -> Abrir();
        $this -> conexion -> ejecutar($this -> administradorDAO -> consultar());
        $resultado = $this -> conexion -> extraer();
        $this -> nombre = $resultado[0];
        $this -> apellido = $resultado[1];
        $this -> correo = $resultado[2];
    }
    
}

