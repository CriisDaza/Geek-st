<?php

class Conec{
    private $mysql;
    private $resultado;

    public function Abrir(){
        $this->mysql = new mysqli("localhost", "root", "", "geek"); 
        $this->mysql->set_charset("utf8");
    }

    public function cerrar() {
        $this->mysql->close();
    }
    
    public function ejecutar($sentencia){
        $this -> resultado = $this -> mysql -> query($sentencia);
    }
    
    public function extraer(){
        return $this -> resultado -> fetch_row();
    }
    
    public function numfilas(){
        return ($this -> resultado != null) ? $this -> resultado -> num_rows:0;
    }
}