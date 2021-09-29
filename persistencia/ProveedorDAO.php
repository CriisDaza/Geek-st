<?php
class ProveedorDAO
{
    private $idproveedor;
    private $nombre;
    private $apellido;
    private $correo;
    private $clave;
    private $admin;
    private $estado;

    public function ProveedorDAO($id="", $nom="", $ape="", $mail="", $clav="", $estado="", $admin=""){
       
        $this -> idproveedor = $id;
        $this -> nombre = $nom;
        $this -> apellido = $ape;
        $this -> correo = $mail;
        $this -> clave = $clav;
        $this -> admin = $admin;
        $this -> estado = $estado;
    }
    
    public function Crear(){
        
        return "insert into proveedor (nombre, apellido, correo, clave, estado, administrador_idadministrador)
                values (
                '" . $this -> nombre . "',
                '" . $this -> apellido . "',
                '" . $this -> correo . "',
                '" . md5($this -> clave). "',
                '" . $this -> estado . "',
                '" . $this -> admin . "'
                 )";
    }

    public function Autenticar(){
        
        return "select idproveedor, estado
                    from proveedor
                    where correo = '" . $this -> correo . "' and clave = '" .md5($this -> clave). "'";
    }
    
    public function Activar(){
        
        return "update proveedor
                    set estado = '1'
                    where idproveedor = '" . $this -> idproveedor . "'";
    }
    
    public function Deshabilitar(){
        
        return "update proveedor
                    set estado = '0'
                    where idproveedor = '" . $this -> idproveedor . "'";
    }
    
    public function ConsultarUltimoId(){
        
        return "select last_insert_id()";
    }
    
    
    public function ConsultarEstado(){
        
        return "select estado
                    from proveedor
                    where idproveedor = " . $this -> idproveedor;
    }
    
    public function Consultar(){
        
        return "select nombre, apellido, correo
                    from proveedor
                    where idproveedor = '" . $this -> idproveedor . "'";
    }
    
    public function ConsultarporProv($atributo, $direccion, $filas , $pag){
        
        return "select idproducto, nombre, precio, cantidad, imagen, proveedor_idproveedor, marca_idmarca, tipoproducto_idtipoproducto
               from producto where proveedor_idproveedor = '" .$this ->idproveedor . "'".
               (($atributo != "" && $direccion != "")?"order by ". $atributo . " " . $direccion:"") .
               " limit " . (($pag-1)*$filas) . ", " . $filas;
    }
    
    public function ConsultarTotalFilasporProv(){
        
        return "select count(idproducto)
                from producto where proveedor_idproveedor ='" .$this -> idproveedor . "'";
    }
    }