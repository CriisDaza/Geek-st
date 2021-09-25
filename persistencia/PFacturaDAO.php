<?php
class PFacturaDAO
{
    private $id;
    private $idfactura;
    private $idproducto;
    private $unidades;
    private $subtotal;
    
    
    public function Pfactura($id="", $idf="", $idp="", $uni="", $subto=""){
        $this -> id = $id;
        $this -> idfactura = $idf;
        $this -> idproducto = $idp;
        $this -> unidades = $uni;
        $this -> subtotal = $subto;
    }
}

