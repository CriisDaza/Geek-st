
<?php 
session_start();
require_once "logica/Admin.php";
require_once "logica/Cliente.php";
require_once 'logica/Producto.php';
require_once 'logica/Marca.php';
require_once 'logica/TipoProducto.php';
require_once 'carrito.php';
if (isset($_GET["sesion"]) && $_GET["sesion"] == "false") {
    $_SESSION["id"] = "";
    
}
$pid="";
if( isset ($_GET["pid"])){
    
    $pid = base64_decode($_GET["pid"]);
}

$pagSinSesion = array(
    "presentacion/autenticar.php",
    "presentacion/cliente/formularioRegistrar.php",
    "presentacion/formularioIngresar.php" 
);

?>
<!doctype html><!-- estas lineas son para bootstrap y eso -->
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.1/css/all.css" />
    <link
	href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css"
	rel="stylesheet"/>
<script
	src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
<script 
	src="https://cdn.jsdelivr.net/npm/jquery@3.2.1/dist/jquery.min.js"></script>	
<script
	src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>

<script charset="utf-8">
$(function () { 
	$("[data-toggle='tooltip']").tooltip(); 
});
</script>
    
    <title>GeekStore</title>
    <link rel="icon" type="image/png" href="img/logo.png"/>
  </head>
  <body>
<?php 
if ($pid != "" && (in_array($pid, $pagSinSesion) || (isset($_SESSION["id"]) && $_SESSION["id"] != ""))) {
    include $pid;
} else {
    include "presentacion/inicio.php";
}

?>
    <div class="container">
		<div class="row mt-3">
			<div class="row">
				<div class="col text-center text-muted">
				<?php echo	"Criis & Jonatan  &copy" . date("Y") ?>	
				</div>
			</div>
		</div>
	</div>
</body>
</html>
  
