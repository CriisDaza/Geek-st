<?php

class PFactura
{
    private $id;
    private $idfactura;
    private $idproducto;
    private $unidades;
    private $subtotal;
    private $pfacturaDAO;
    
    
    public function Pfactura($id="", $idf="", $idp="", $uni="", $subto=""){
        $this -> id = $id;
        $this -> idfactura = $idf;
        $this -> idproducto = $idp;
        $this -> unidades = $uni;
        $this -> subtotal = $subto;
        $this -> conexion = new Conec();
        $this -> pfacturaDAO = new FacturaDAO($id, $idf, $idp, $uni, $subto);
    }
}

