<?php
require_once 'persistencia/ClienteDAO.php';
require_once "persistencia/Conec.php";

class Cliente
{
    private $id;
    private $nombre;
    private $apellido;
    private $correo;
    private $clave;
    private $direccion;
    private $estado;
    private $conexion;
    private $clienteDAO;
    
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

    public function getDireccion()
    {
        return $this->direccion;
    }
    
    public function getEstado()
    {
        return $this->estado;
    }

    public function Cliente($id=0, $nom="", $ape="", $mail="", $clav="", $direc="", $estado=""){
        
        $this -> id = $id;
        $this -> nombre = $nom;
        $this -> apellido = $ape;
        $this -> correo = $mail;
        $this -> clave = $clav;
        $this -> direccion = $direc;
        $this -> estado = $estado;
        $this -> conexion = new Conec();
        $this -> clienteDAO = new ClienteDAO($id, $nom, $ape, $mail, $clav, $direc, $estado);
    }
    
    public function Crear(){
        
        $this -> conexion -> Abrir();
        $this -> conexion -> ejecutar($this -> clienteDAO -> Crear());
        $this -> conexion -> ejecutar($this -> clienteDAO -> ConsultarUltimoId());
        $resultado = $this -> conexion -> extraer();
        $this -> conexion -> cerrar();
        
        return $resultado[0];
    }
    
    public function Autenticar(){
        
        $this -> conexion -> Abrir();
        $this -> conexion -> ejecutar($this -> clienteDAO -> Autenticar());
        
        if($this -> conexion -> numFilas() == 0){
            
            return false;
        }else{
            
            $resultado = $this -> conexion -> extraer();
            $this -> id = $resultado[0];
            $this -> estado = $resultado[1];
            
            return true;
        }
    }
    
    public function Activar(){
        
        $this -> conexion -> Abrir();
        $this -> conexion -> ejecutar($this -> clienteDAO -> Activar());
        $this -> conexion -> cerrar();
    }
    
    public function Deshabilitar(){
        
        $this -> conexion -> Abrir();
        $this -> conexion -> ejecutar($this -> clienteDAO -> Deshabilitar());
        $this -> conexion -> cerrar();
    }
    
    public function consultarEstado(){
        
        $this -> conexion -> Abrir();
        $this -> conexion -> ejecutar($this -> clienteDAO -> ConsultarEstado());
        $resultado = $this -> conexion -> extraer();
        $this -> estado = $resultado[0];
    }
    
    public function Consultar() {
        
        $this -> conexion -> Abrir();
        $this -> conexion -> ejecutar($this -> clienteDAO -> Consultar());
        $resultado = $this -> conexion -> extraer();
        $this -> nombre = $resultado[0];
        $this -> apellido = $resultado[1];
        $this -> correo = $resultado[2];
        ;
    }
    

}
