<?php
class AdminDAO{
    
    private $id;
    private $nombre;
    private $apellido;
    private $correo;
    private $clave;
    
    public function AdminDAO($id = 0, $nombre = "", $apellido = "", $correo = "", $clave = ""){
        //asignacion dinamica de parametros=""
        $this -> id=$id;
        $this -> nombre=$nombre;
        $this -> apellido=$apellido;
        $this -> correo=$correo;
        $this -> clave=$clave;
    }
    
    public function Autenticar(){
        return "select idadministrador
                from administrador 
               where correo= '". $this ->correo  ."' and clave ='" . md5($this -> clave) . "'";
    } 
    
    public function consultar(){
        return "select nombre, apellido, correo
                from administrador
                where idadministrador = '" . $this -> id . "'";
    }
    
}

