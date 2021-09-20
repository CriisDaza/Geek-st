
<?php

if(isset($_POST["crear"])){
   
    $cliente=new Cliente("",$_POST["nombre"], $_POST["apellido"], $_POST["correo"], $_POST["clave"], $_POST["direccion"], 1);
    $cliente ->Crear();
    
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
				<h5 class="card-header">Formulario de Registro</h5>
				<div class="card-body">
					<?php 
					   if (isset($_POST["crear"])) { 
					       
					           echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                                     Datos ingresados correctamente.
                                     <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
					       } 
					   
					?>
					<form action="index.php?pid=<?php echo base64_encode("presentacion/cliente/formularioRegistrar.php") ?>" method="post">
						<div class="mb-3">
							<label class="form-label">Nombre</label>
							<input type="text" class="form-control" name="nombre" required="required">
						</div>
						<div class="mb-3">
							<label class="form-label">Apellido</label>
							<input type="text" class="form-control" name="apellido" required="required">
						</div>
						<div class="mb-3">
							<label class="form-label">Correo</label>
							<input type="email" class="form-control" name="correo" required="required">
						</div>
						<div class="mb-3">
							<label class="form-label">Clave</label>
							<input type="password" class="form-control" name="clave" required="required">
						</div>
						<div class="mb-3">
							<label class="form-label">Direccion</label>
							<input type="text" class="form-control" name="direccion" required="required">
						</div>
						<div class="d-grid">
							<button type="submit" name="crear" class="btn btn-primary">Registrarme</button>
						</div>
						
					<p>	<a href="index.php?pid= <?php echo base64_encode("presentacion/formularioIngresar.php")?>"> Ya tienes una cuenta?</a></p>
					<a href="index.php">Regresar</a>
						
					</form>				

				</div>
			</div>
		</div>
		<div class="col-1 col-sm-2 col-lg-4"> </div>
	</div>
</div>
