<?php
require_once 'persistencia/CarritoDAO.php';
require_once "persistencia/Conec.php";

class Carrito
{
        private $idcarrito;
        private $estado;
        private $idcliente;
        private $conexion;
        private $carritoDAO;
        
        public function getIdcarrito()
        {
            return $this->idcarrito;
        }
    
        public function getEstado()
        {
            return $this->estado;
        }
    
        public function getIdcliente()
        {
            return $this->idcliente;
        }
    
        public function Carrito($id="", $estado="", $idcliente=""){
            
            $this -> idcarrito = $id;
            $this -> estado = $estado;
            $this -> idcliente = $idcliente;
            $this -> conexion = new Conec();
            $this -> carritoDAO = new CarritoDAO($id,$estado,$idcliente);
        }
        
        public function Crear(){
            
           $this ->conexion ->Abrir();
           $this ->conexion -> ejecutar($this ->carritoDAO -> Crear());
           $this ->conexion -> ejecutar($this ->carritoDAO -> ConsultarUltimoId());
           $resultado = $this -> conexion ->extraer();
           $this -> conexion -> cerrar();
           
           return $resultado[0];
        }
        
        public function CambiarEstado() {
            
            $this -> conexion -> Abrir();
            $this -> conexion -> ejecutar($this -> carritoDAO -> CambiarEstado());
            $this -> conexion -> cerrar();
        }
        
        public function ConsultarCarro(){
            
            $this ->conexion ->Abrir();
            $this ->conexion -> ejecutar($this ->carritoDAO -> ConsultarCarro());
            $resultado = $this -> conexion -> extraer();
            $this -> conexion -> cerrar();
            
            return $resultado[0];
        }
        
        public function ConsultarProductos(){
            
            $this -> conexion -> Abrir();
            $this -> conexion -> ejecutar($this -> carritoDAO -> ConsultarProductos());
            $productos = array();
            
            while(($resultado = $this -> conexion -> extraer()) != null){
                
                $productoaux=new Producto($resultado[0]);
                $productoaux -> Consultar();
                
                array_push($productos,new Producto($productoaux ->getId(),$productoaux ->getNombre(),$productoaux -> getPrecio(),$resultado[1],$productoaux ->getImagen(),"","",""));
            }
            
            $this -> conexion -> cerrar();
            
            return $productos;
        }
        
        public function CantidadCarrito(){
            
            $this -> conexion ->Abrir();
            $this ->conexion -> ejecutar($this ->carritoDAO -> CantidadCarrito());
            $resultado = $this -> conexion -> extraer();
            $this -> conexion -> cerrar();
            
            return $resultado[0];
        }
        
        public function ConsultarPrecio(){
            
            $this -> conexion ->Abrir();
            $this -> conexion -> ejecutar($this -> carritoDAO -> ConsultarPrecio());
            $resultado = $this ->conexion ->extraer();
            $this -> conexion ->cerrar();
            
            return $resultado[0];
        }
    }
    
    


