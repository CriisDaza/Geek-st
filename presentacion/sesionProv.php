
<?php
include 'presentacion/menuProv.php';

$p = new Proveedor($_SESSION["id"]);
$p->consultar();

?>

<div class="container">
	<div class="row mt-3">
		<div class="col">
			<div class="card">
				<h5 class="card-header">Bienvenido <?php echo $p -> getNombre(). " " . $p -> getApellido()?></h5>
				<div class="card-body">su correo es: <?php echo $p -> getCorreo()?></div>
			</div>
		</div>
	</div>
</div>
