<?php

class ProductoDAO
{

    private $idproducto;
    private $nombre;
    private $precio;
    private $cantidad;
    private $imagen;
    private $proveedor_idproveedor;
    private $marca_idmarca;
    private $tipoproducto_idtipoproducto;

    public function ProductoDAO($id = "", $nombre = "", $precio = "", $cantidad = "", $imagen = "", $proveedor = "", $marca = "", $tipoProducto = "")
    {
        $this->idproducto = $id;
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->cantidad = $cantidad;
        $this->imagen = $imagen;
        $this->proveedor_idproveedor = $proveedor;
        $this->marca_idmarca = $marca;
        $this->tipoproducto_idtipoproducto = $tipoProducto;
    }

    public function Crear()
    {
       return "insert into producto (nombre, precio, cantidad, proveedor_idproveedor, marca_idmarca, tipoproducto_idtipoproducto)
              values (
              '" . $this->nombre . "',
              '" . $this->precio . "',
              '" . $this->cantidad . "',
              '" . $this->proveedor_idproveedor . "',
              '" . $this->marca_idmarca . "',
              '" . $this->tipoproducto_idtipoproducto . "'
              )";
    }
    
    public function Consultar(){
        
        return "select idproducto, nombre, precio, cantidad, imagen, proveedor_idproveedor, marca_idmarca, tipoproducto_idtipoproducto
                from producto where idproducto = '" . $this ->idproducto . "'"; 
    }
    
    public function ConsultarTodos($atributo, $direccion, $filas , $pag){
        
        return "select idproducto, nombre, precio, cantidad, imagen, proveedor_idproveedor, marca_idmarca, tipoproducto_idtipoproducto
               from producto " . 
               (($atributo != "" && $direccion != "")?"order by ". $atributo . " " . $direccion:"") .
               " limit " . (($pag-1)*$filas) . ", " . $filas;
    }
    
    public function ConsultarTotalFilas(){
        
        return "select count(idproducto)
                from producto";
    }
    
    public function ConsultarFiltro($filtro){
        
        return "select idproducto, nombre, precio, cantidad, imagen, proveedor_idproveedor, marca_idmarca, tipoproducto_idtipoproducto
                from producto
                where nombre like '" . $filtro . "%'";
    }
    
    public function EditarImagen(){
        
        return "update producto set imagen = '" . $this -> imagen . "'
                where idproducto = '" . $this -> idproducto . "'";
    }
    
    public function Agregar() {
        
        return "UPDATE producto SET cantidad = producto.cantidad + '" . $this -> cantidad . "'
               WHERE idproducto='" . $this -> idproducto . "'";
    }
}


