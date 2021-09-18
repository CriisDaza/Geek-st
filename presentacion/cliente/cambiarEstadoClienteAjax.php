<?php
require_once "logica/Cliente.php";

$cliente = new Cliente($_GET["id"]);
$cliente -> ConsultarEstado();
if($cliente -> getEstado() == 1){
    $cliente -> Deshabilitar();
    echo "Deshabilitado";
}else if($cliente -> getEstado() == 0){
    $cliente -> Activar();
    echo "Activo";
}