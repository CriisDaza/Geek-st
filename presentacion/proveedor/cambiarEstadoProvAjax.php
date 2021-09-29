<?php
require_once "logica/Proveedor.php";

$p = new Proveedor($_GET["id"]);
$p -> ConsultarEstado();

if($p -> getEstado() == 1){
    
    $p -> Deshabilitar();
    echo "Deshabilitado";
    
}else if($p -> getEstado() == 0){
    
    $p -> Activar();
    echo "Activo";
}