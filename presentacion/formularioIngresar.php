<?php
$error = 0;

if (isset($_GET["error"])) {
    $error = $_GET["error"];
}
?>
<div class="container">
	<div class="row mt-3">
		<div class="col-3 col-sm-2 col-lg-2 text-end">
			<img src="img/logo.png" width="50%">

		</div>
		<div class="col-6 col-sm-8 col-lg-8">
			<h1 class="text-center">Geek Store</h1>
		</div>

	</div>
	<div class="row mt-3">
	<div class="col-1 col-sm-2 col-lg-4 " ></div>
		<div class="col-10 col-sm-8 col-lg-4">
			<div class="card">
				<h5 class="card-header text-center">Ingresar</h5>
				<div class="card-body">
					<form
						action="index.php?pid=<?php echo base64_encode("presentacion/autenticar.php")?>"
						method="post">
						<!-- en formularios se debe usar el metodo post no get ya que es inseguro -->
						<div class="mb-3">
							<input type="email" name="correo" class="form-control"
								placeholder="Correo" required="required">
							<!-- significa que es necesario  -->
						</div>
						<div class="mb-3">
							<input type="password" name="clave" class="form-control"
								placeholder="Clave" required="required">
						</div>
						<div class="d-grid">
							<button type="submit" class="btn btn-primary">Entrar</button>
						</div>
						<p><a href="index.php?pid= <?php echo base64_encode("presentacion/cliente/formularioRegistrar.php")?>"> No tienes cuenta?</a></p>
						<a href="index.php">Regresar</a>
					</form>
				
			<?php if(isset ($_GET["error"])) {?>
						<div class="alert alert-danger alert-dismissible fade show mt-2"
						role="alert">
						<?php if($error==1) { 
						?>
						Error de correo o clave
						<?php } else if($error==2)  { ?>
						Su cuenta ha sido deshabilitada comuniquese con el admin
						
						<?php } ?>
						<button type="button" class="btn-close" data-bs-dismiss="alert"
							aria-label="Close"></button>
					
					<?php }?>
						</div>
						
	
					</div>
			</div>
		</div>
	</div>
</div>

