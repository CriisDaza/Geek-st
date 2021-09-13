<?php

class ProductoDAO
{

    private $idproducto;

    private $nombre;

    private $precio;

    private $cantidad;

    private $imagen;

    private $administrador_idadministrador;

    private $marca_idmarca;

    private $tipoproducto_idtipoproducto;

    public function ProductoDAO($id = "", $nombre = "", $precio = "", $cantidad = "", $imagen = "", $administrador = "", $marca = "", $tipoProducto = "")
    {
        $this->idproducto = $id;
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->cantidad = $cantidad;
        $this->imagen = $imagen;
        $this->administrador_idadministrador = $administrador;
        $this->marca_idmarca = $marca;
        $this->tipoproducto_idtipoproducto = $tipoProducto;
    }

    public function Crear()
    {
       return "insert into producto (nombre, precio, cantidad, administrador_idadministrador, marca_idmarca, tipoproducto_idtipoproducto)
              values (
              '" . $this->nombre . "',
              '" . $this->precio . "',
              '" . $this->cantidad . "',
              '" . $this->administrador_idadministrador . "',
              '" . $this->marca_idmarca . "',
              '" . $this->tipoproducto_idtipoproducto . "'
              )";
    }
    
    public function Consultar(){
        return "select idproducto, nombre, precio, cantidad, imagen, administrador_idadministrador, marca_idmarca, tipoproducto_idtipoproducto
                from producto where idproducto= '" . $this ->idproducto . "'"; 
    }
    
    public function ConsultarTodos($atributo, $direccion, $filas , $pag){
        return "select idproducto, nombre, precio, cantidad, imagen, administrador_idadministrador, marca_idmarca, tipoproducto_idtipoproducto
               from producto " . 
               (($atributo != "" && $direccion != "")?"order by ". $atributo . " " . $direccion:"") .
               " limit " . (($pag-1)*$filas) . ", " . $filas;
    }
    
    public function ConsultarTotalFilas(){
        return "select count(idproducto)
                from producto";
    }
    
    public function ConsultarFiltro($filtro){
        return "select idproducto, nombre, precio, cantidad, imagen, administrador_idadministrador, marca_idmarca, tipoproducto_idtipoproducto
                from producto
                where nombre like '" . $filtro . "%'";
    }
    
    public function EditarImagen(){
        return "update producto set imagen = '" . $this -> imagen . "'
                where idproducto = '" . $this -> idproducto . "'";
    }
}


