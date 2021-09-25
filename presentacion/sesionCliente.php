<?php

if(isset($_POST["agregar"])){
    $pcarrito=new PCarrito($_SESSION["carrito"], $_GET["p"], $_POST["cantidad"]);
    $pcarrito ->AgregaralCarrito();
    $_SESSION["car"]=$_SESSION["car"] +$_POST["cantidad"];
}

include "presentacion/menuCliente.php";

$cliente = new Cliente($_SESSION["id"]);
$cliente ->Consultar();


if(isset($_POST["agregar"])){
    $pcarrito=new PCarrito($_SESSION["carrito"], $_GET["p"], $_POST["cantidad"]);
    $pcarrito ->AgregaralCarrito();
    $_SESSION["car"]=$_SESSION["car"] +$_POST["cantidad"];
}

?>


<div class="container">
		<div class="row mt-3">
			<div class="col-3 col-sm-2  col-lg-2 text-end">
				<img src="img/logo.png" width="50%">
			</div>
			<div class="col-6 col-sm-8  col-lg-8">
				<h1 class="text-center">Geek-Store</h1>
			</div>
		</div>
		<div class="row mt-3">
			<div class="col">
				<div class="card">
					<div class="card-body">
					<?php include "presentacion/cliente/productosDisponibles.php" ?> 
					</div>
				</div>
			</div>
		
					
				</div>
			</div>
	