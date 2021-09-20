<?php
class ClienteDAO
{
    private $idcliente;
    private $nombre;
    private $apellido;
    private $correo;
    private $clave;
    private $direccion;
    private $estado;

    public function ClienteDAO($id="", $nom="", $ape="", $mail="", $clav="", $direc="", $estado=""){
       
        $this -> idcliente = $id;
        $this -> nombre = $nom;
        $this -> apellido = $ape;
        $this -> correo = $mail;
        $this -> clave = $clav;
        $this -> direccion = $direc;
        $this -> estado = $estado;
    }
    
    public function Crear(){
        
        return "insert into cliente (nombre, apellido, correo, clave, direccion, estado)
                values (
                '" . $this -> nombre . "',
                '" . $this -> apellido . "',
                '" . $this -> correo . "',
                '" . md5($this -> clave). "',
                '" . $this -> direccion . "',
                '" . $this -> estado . "'
                 )";
}

public function Autenticar(){
    return "select idcliente, estado
                from cliente
                where correo = '" . $this -> correo . "' and clave = '" .md5($this -> clave). "'";
}

public function Activar(){
    return "update cliente
                set estado = '1'
                where idcliente = '" . $this -> idcliente . "'";
}

public function Deshabilitar(){
    return "update cliente
                set estado = '0'
                where idcliente = '" . $this -> idcliente . "'";
}

public function ConsultarUltimoId(){
    return "select last_insert_id()";
}

public function ConsultarTodos(){
    return "select idcliente, nombre, apellido, correo, direccion, estado 
                from cliente";
}

public function ConsultarEstado(){
    return "select estado
                from cliente
                where idcliente = " . $this -> idcliente;
}

public function Consultar(){
    return "select nombre, apellido, correo
                from cliente
                where idcliente = '" . $this -> idcliente . "'";
}
}
