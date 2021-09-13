<?php
require_once 'persistencia/Conec.php';
require_once 'persistencia/TipoProductoDAO.php';

class TipoProducto
{

    private $idtipoproducto;
    private $nombre;
    private $conexion;
    private $tipoproductoDAO;

    public function getIdtipoproducto()
    {
        return $this->idtipoproducto;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function TipoProducto($id = "", $nombre = "")
    {
        $this->idtipoproducto =$id;
        $this->nombre = $nombre;
        $this->conexion = new Conec();
        $this->tipoproductoDAO = new TipoProductoDAO($id, $nombre);
    }

    public function Consultar()
    {
        $this->conexion->Abrir();
        $this->conexion->ejecutar($this->tipoproductoDAO->Consultar());
        $resultado = $this->conexion->extraer();
        $this->nombre = $resultado[0];
        $this->conexion->cerrar();
    }

    public function ConsultarTodos()
    {
        $this->conexion->Abrir();
        $this -> conexion -> ejecutar($this -> tipoproductoDAO -> ConsultarTodos());
        $tiposProducto = array();
        
        while (($resultado = $this->conexion->extraer()) != null) {
            array_push($tiposProducto, new TipoProducto($resultado[0], $resultado[1]));
        }
        $this->conexion->cerrar();
        return $tiposProducto;
    }
}

