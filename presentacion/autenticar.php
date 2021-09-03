<?php
$correo = $_POST["correo"];
$clave = $_POST["clave"];

$administrador = new Admin( 0, "", "", $correo, $clave);

if($administrador -> autenticar()){
    $_SESSION["id"] = $administrador -> getId();
   // echo "ok";
    header("location: index.php?pid=" . base64_encode("presentacion/sesionAdmin.php"));
}else{
    header("Location: index.php?error=1");
}

