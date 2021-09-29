<?php
require_once 'persistencia/PFacturaDAO.php';
require_once 'persistencia/Conec.php';
class PFactura
{

    private $idfactura;
    private $idproducto;
    private $unidades;
    private $subtotal;
    private $conexion;
    private $pfacturaDAO;
    
    
    public function getSubtotal()
    {
        return $this->subtotal;
    }


    public function getIdfactura()
    {
        return $this->idfactura;
    }

    public function getIdproducto()
    {
        return $this->idproducto;
    }

    public function getUnidades()
    {
        return $this->unidades;
    }

    public function getPfacturaDAO()
    {
        return $this->pfacturaDAO;
    }
    

    public function PFactura( $idf="", $idp="", $uni="", $subto=""){
        
        $this -> idfactura = $idf;
        $this -> idproducto = $idp;
        $this -> unidades = $uni;
        $this -> subtotal = $subto;
        $this -> conexion = new Conec();
        $this -> pfacturaDAO = new PFacturaDAO($idf, $idp, $uni, $subto);
    }
    
    public function AgregaraFactura(){
       
        $this -> conexion ->Abrir();
        $this -> conexion ->ejecutar($this ->pfacturaDAO -> AgregaraFactura());
        $this -> conexion -> cerrar();
    }
    
    public function Descontar() {
        $this -> conexion ->Abrir();
        $this -> conexion ->ejecutar($this ->pfacturaDAO ->Descontar() );
        $this -> conexion -> cerrar();
    }
}

