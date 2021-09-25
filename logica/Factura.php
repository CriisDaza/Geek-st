<?php

class Factura
{
    private $id;
    private $fecha;
    private $hora;
    private $total;
    private $idcliente;
    private $FacturaDAO;
    
    public function Factura($id="", $fecha="", $hora="",$total="",$idc=""){
        $this -> id = $id;
        $this -> fecha = $fecha;
        $this -> hora = $hora;
        $this -> total = $total;
        $this -> idcliente = $idc;
        $this -> conexion = new Conec();
        $this -> FacturaDAO = new FacturaDAO($id, $fecha, $hora, $total, $idc);
    }
}

