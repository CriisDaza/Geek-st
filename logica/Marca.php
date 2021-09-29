<?php
require_once 'persistencia/MarcaDAO.php';
require_once 'persistencia/Conec.php';

class Marca
{
    private $idmarca; 
    private $nombre; 
    private $conexion;
    private $marcaDAO;
    
    public function getIdmarca()
    {
        return $this->idmarca;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setIdmarca($idmarca)
    {
        $this->idmarca = $idmarca;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function Marca($idmarca="",$nombre=""){
        
        $this -> idmarca = $idmarca;
        $this -> nombre = $nombre;
        $this -> conexion = new Conec();
        $this -> marcaDAO = new MarcaDAO($idmarca,$nombre);
    }
    
    public function Consultar(){
        
        $this -> conexion -> Abrir();
        $this -> conexion -> ejecutar($this -> marcaDAO -> Consultar());
        $resultado = $this -> conexion -> extraer();
        $this -> nombre = $resultado[0];
        $this -> conexion -> cerrar();
    }
    
    public function ConsultarTodos(){
        
        $this -> conexion -> Abrir();
        $this -> conexion -> ejecutar($this -> marcaDAO -> ConsultarTodos());
        $marcas = array();
        
        while(($resultado = $this -> conexion -> extraer()) != null){
            
            array_push($marcas, new Marca($resultado[0], $resultado[1]));
        }
        
        $this -> conexion -> cerrar();
        
        return $marcas;
    }
    
}

