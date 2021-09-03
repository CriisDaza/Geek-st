
<?php
include 'presentacion/menuAdmin.php';

$administrador = new Admin($_SESSION["id"]);
$administrador->consultar();

?>

<div class="container">
	<div class="row mt-3">
		<div class="col">
			<div class="card">
				<h5 class="card-header">Bienvenido <?php echo $administrador -> getNombre(). " " . $administrador -> getApellido()?></h5>
				<div class="card-body">su correo es: <?php echo $administrador -> getCorreo()?></div>
			</div>
		</div>
	</div>
</div>
