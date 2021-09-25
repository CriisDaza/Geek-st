<?php
class PCarritoDAO
{
    private $carrito_idcarrito;
    private $producto_idproducto;
    private $cantidad;
    
    public function PCarritoDAO($idcarrito="", $id_producto="", $cantidad=""){
        
        $this -> carrito_idcarrito = $idcarrito;
        $this -> producto_idproducto = $id_producto;
        $this -> cantidad = $cantidad;
        
    }
    
    public function AgregaralCarrito(){
        
        return "insert into pcarrito (carrito_idcarrito, producto_idproducto, cantidad)
                values (
                '" . $this -> carrito_idcarrito . "',
                '" . $this -> producto_idproducto . "',
                '" . $this -> cantidad. "'
                 )";
    }
    
    public function BorrardelCarrito(){
        
        return "delete from pcarrito 
                where carrito_idcarrito = '" .$this -> carrito_idcarrito . 
                "' and producto_idproducto = '". $this -> producto_idproducto ."'"; 
    }
    
    public function CambiarCantidad(){
        return "update pcarrito
                set cantidad = '" . $this -> cantidad . "'
                where carrito_idcarrito = '" .$this -> carrito_idcarrito . 
                "' and producto_idproducto = '". $this -> producto_idproducto ."'";
    }
}

