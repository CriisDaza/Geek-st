<?php
class PFacturaDAO
{
    
    private $idfactura;
    private $idproducto;
    private $unidades;
    private $subtotal;
    
    
    public function PFacturaDAO( $idf="", $idp="", $uni="", $subto=""){
        
        $this -> idfactura = $idf;
        $this -> idproducto = $idp;
        $this -> unidades = $uni;
        $this -> subtotal = $subto;
    }
    
    public function AgregaraFactura(){
        
        return "insert into pfactura (factura_idfactura, producto_idproducto, unidades, subtotal)
                values (
                '" . $this -> idfactura . "',
                '" . $this -> idproducto . "',
                '" . $this -> unidades. "',
                '" . $this -> subtotal. "'
                 )";
    }
    
    public function Descontar() {
        
       return "UPDATE producto SET cantidad = producto.cantidad - '" .$this -> unidades . "'    
               WHERE idproducto='" . $this -> idproducto. "'";
    }
}

