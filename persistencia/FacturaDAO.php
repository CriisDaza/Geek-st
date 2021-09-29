<?php

class FacturaDAO
{
    private $id;
    private $total;
    private $idcliente;
    
    
    public function FacturaDAO($id="",$total="",$idc=""){
        
        $this -> id = $id;
        $this -> total = $total;
        $this -> idcliente = $idc;
    }
    
    
    public function CrearFactura(){
        
        return "insert into factura (fecha, hora, total, cliente_idcliente)
          values (CURRENT_DATE,DATE_FORMAT(NOW( ), '%H:%i:%S' ), 
          '" .$this -> total ."',
           '". $this -> idcliente. "')";

    }
    public function Consultar(){
        return "SELECT  fecha, hora, total,nombre, apellido  from factura join  cliente on cliente.idcliente=factura.cliente_idcliente
            where factura.idfactura='" .$this -> id. "'";
    }
    public function ConsultarUltimoId(){
        
        return "select last_insert_id()";
    }
    
    public function ConsultarProductos(){
        
        return "select producto_idproducto, unidades, subtotal
                from facturaproducto  where factura_idfactura = " . $this -> id;
    }
    
}

