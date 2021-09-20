<?php
$correo = str_replace(" ","#", $_POST["correo"]);
$clave = $_POST["clave"];
$administrador = new Admin( 0, "", "", $correo, $clave,);
if($administrador -> autenticar()){
    $_SESSION["id"] = $administrador -> getId();
    header("location: index.php?pid=" . base64_encode("presentacion/sesionAdmin.php"));
}else{
    $cliente = new Cliente( "", "", "", $correo, $clave);
    if($cliente -> Autenticar()){
        if($cliente -> getEstado() == 1){
            $_SESSION["id"] = $cliente -> getId();
            header("Location: index.php?pid=" . base64_encode("presentacion/sesionCliente.php"));
        }else if($cliente -> getEstado() == 0){
            $error=2;
            header("Location: index.php?pid=".base64_encode("presentacion/formularioIngresar.php")."&error=".$error);
        }
    }else{
        $error=1;
        header("Location: index.php?pid=".base64_encode("presentacion/formularioIngresar.php")."&error=".$error);
    }

}
?>

<script>
$("#error").change(function() {
    var error = $("#error").val();
    var url = "index.php?pid=<?php echo base64_encode("presentacion/formularioIngresar.php") ?>&error=" + error;
    location.replace(url);
});
    </script>