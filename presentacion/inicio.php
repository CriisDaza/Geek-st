

  
  	<div class="container">
		<!--  tambien hay contariner fluid que es para todo el ancho de la pantalla -->
		<div class="row mt-3">
			<div class="col-3 col-sm-3  col-lg-2 text-center">
				<!-- son de 12 columnas asi que hay que saber distribuir las cosas -->
				<img src="img/logo.png" width="50%">
				<!-- insertar de otra carpeta imagen y darle tamaño -->
			</div>
			<div class="col-9 col-sm-9  col-lg-10">
				<h1 class="text-center">Geek-Store</h1>
				<!-- dar texto y con el text acomodar a dodne querramos -->
			</div>
		</div>
		<div class="row mt-3">
			<div class="col-12 col-md-7">
				<div class="card">
					<h5 class="card-header">Bienvenido perron</h5>
					<div class="card-body">
						<!-- cards para ordenar la pagina -->
						<img src="img/Fondo.jpg" width="100%">
						<!-- se adapta al tamaño del card -->
					</div>
				</div>
			</div>
			<div class="col-12 col-md-5">
				<div class="card">
					<h5 class="card-header text-center">Ingresar</h5>
					<div class="card-body">
						<form action="index.php?pid=<?php echo base64_encode("presentacion/autenticar.php")?>" method="post">
						  <!-- en formularios se debe usar el metodo post no get ya que es inseguro -->
							<div class="mb-3">
								<input type="email" name="correo" class="form-control" placeholder="Correo"
									required="required">
								<!-- significa que es necesario  -->
							</div>
							<div class="mb-3">
								<input type="password" name="clave" class="form-control" placeholder="Clave"
									required="required">
							</div>
							<div class="d-grid">
								<button type="submit" class="btn btn-primary">Entrar</button>
							</div>
						</form>
						<?php 
						
						if(isset($_GET["error"])){?>
						<div class="alert alert-danger alert-dismissible fade show mt-2"
							role="alert">
							Error de correo o clave
							<button type="button" class="btn-close" data-bs-dismiss="alert"
								aria-label="Close"></button>
						</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>

