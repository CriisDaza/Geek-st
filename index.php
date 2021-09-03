
<?php 
session_start();
require_once "logica/Admin.php";

if (isset($_GET["sesion"]) && $_GET["sesion"] == "false") {
    $_SESSION["id"] = "";
}
$pid="";
if( isset ($_GET["pid"])){
    
    $pid = base64_decode($_GET["pid"]);
}

$pagSinSesion = array(
    "presentacion/autenticar.php"
);

?>
<!doctype html><!-- estas lineas son para bootstrap y eso -->
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.1/css/all.css" />
    <title>Pruebas-Cris</title>
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
					Criis R &copy; <?php echo date("Y") ?>	
				</div>
			</div>
		</div>
	</div>
</body>
</html>
  
