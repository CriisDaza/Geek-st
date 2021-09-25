<?php
class FacturaDAO
{
    private $id;
    private $fecha;
    private $hora;
    private $total;
    private $idcliente;
    
    
    public function FacturaDAO($id="", $fecha="", $hora="",$total="",$idc=""){
        $this -> id = $id;
        $this -> fecha = $fecha;
        $this -> hora = $hora;
        $this -> total = $total;
        $this -> idcliente = $idc;
    }
    
}

