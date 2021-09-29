<?php
class CarritoDAO
{
    private $idcarrito;
    private $estado;
    private $cliente_idcliente;
    
   
    public function CarritoDAO($id="", $estado="", $idcliente=""){
        
        $this -> idcarrito = $id;
        $this -> estado = $estado;
        $this -> cliente_idcliente = $idcliente;
    }
    
    public function Crear(){
        
        return "insert into carrito (estado, cliente_idcliente)
                values ( 1,
                '" . $this -> cliente_idcliente . "'
                 )";
    }
    
    public function CambiarEstado() {
        
        return "update carrito
                set estado = '0'
                where idcarrito = '" . $this -> idcarrito . "'";
    }
   
    public function ConsultarCarro(){
        
        return "select idcarrito 
                from carrito
                where estado = 1  and  cliente_idcliente = '" . $this -> cliente_idcliente . "'";
    }
    
    public function ConsultarProductos(){
        
        return "select producto_idproducto, cantidad 
                from pcarrito  where carrito_idcarrito = " . $this -> idcarrito;
    }
    
    public function ConsultarUltimoId(){
        
        return "select last_insert_id()";
    }
    
    public function CantidadCarrito(){
        
        return "select sum(cantidad) from pcarrito where carrito_idcarrito = '" . $this -> idcarrito . "'";
    }
    
    public function ConsultarPrecio(){
        
       return  "select  sum(p.precio*c.cantidad) 
                from pcarrito as c,producto as p where 
                (p.idproducto=c.producto_idproducto) 
                and c.carrito_idcarrito = '".$this ->idcarrito."'";
    }
}

