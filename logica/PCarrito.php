<?php
require_once 'persistencia/PCarritoDAO.php';
require_once "persistencia/Conec.php";

class PCarrito
{
        private $carrito_idcarrito;
        private $producto_idproducto;
        private $cantidad;
        private $conexion;
        private $pcarritoDAO;
        
        public function PCarrito($idcarrito="", $id_producto="", $cantidad=""){
            
            
            $this -> carrito_idcarrito = $idcarrito;
            $this -> producto_idproducto = $id_producto;
            $this -> cantidad = $cantidad;
            $this -> conexion = new Conec();
            $this -> pcarritoDAO = new PCarritoDAO($idcarrito, $id_producto, $cantidad);
            
        }
        
        public function AgregaralCarrito(){
            
           $this -> conexion ->Abrir();
           $this -> conexion ->ejecutar($this -> pcarritoDAO ->AgregaralCarrito());
           $this -> conexion -> cerrar(); 
        }
        
        public function BorrardelCarrito(){
            
            $this -> conexion ->Abrir();
            $this -> conexion ->ejecutar($this -> pcarritoDAO ->BorrardelCarrito());
            $this -> conexion -> cerrar(); 
        }
        
        public function CambiarCantidad(){
            
            $this -> conexion ->Abrir();
            $this -> conexion ->ejecutar($this -> pcarritoDAO ->CambiarCantidad());
            $this -> conexion -> cerrar(); 
        }
    }
    
    


