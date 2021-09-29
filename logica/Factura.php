<?php
require_once 'persistencia/FacturaDAO.php';
require_once 'persistencia/Conec.php';

class Factura
{
    private $id;
    private $total;
    private $idcliente;
    private $conexion;
    private $facturaDAO;
    
    public function Factura($id="",$total="",$idc=""){
        
        $this -> id = $id;
        $this -> total = $total;
        $this -> idcliente = $idc;
        $this -> conexion = new Conec();
        $this -> facturaDAO = new FacturaDAO($id, $total, $idc);
    }
    
    public function CrearFactura(){
        
        $this -> conexion -> Abrir();
        $this -> conexion -> ejecutar($this -> facturaDAO ->CrearFactura());
        $this -> conexion -> ejecutar($this -> facturaDAO -> ConsultarUltimoId());
        $resultado= $this -> conexion ->extraer();
        $this -> conexion -> cerrar();
        
        return $resultado[0];
        
    }
    
    public function ConsultarProductos(){
        
        $this -> conexion -> Abrir();
        $this -> conexion -> ejecutar($this -> facturaDAO -> ConsultarProductos());
        $productos = array();
        
        while(($resultado = $this -> conexion -> extraer()) != null){
            
            $productoaux=new Producto($resultado[0]);
            $productoaux -> Consultar();
            
            array_push($productos,new Producto("",$resultado[2],$resultado[1],$productoaux ->getImagen(),"","",""));
            
        }
        
        $this -> conexion -> cerrar();
        
        return $productos;
    }
    
    public function Consultar(){
       
        $this -> conexion -> Abrir();
        $this -> conexion -> ejecutar($this -> facturaDAO ->Consultar());
        $resultado= $this -> conexion ->extraer();
        $this -> conexion -> cerrar();
        
        return $resultado;
    }
  
}

