

  <?php 
            include "menuInicio.php"?>
  	<div class="container">
		<!--  tambien hay contariner fluid que es para todo el ancho de la pantalla -->
		<div class="row mt-3">
			<div class="col-3 col-sm-2  col-lg-2 text-end">
				<!-- son de 12 columnas asi que hay que saber distribuir las cosas -->
				<img src="img/logo.png" width="50%">
				<!-- insertar de otra carpeta imagen y darle tamaño -->
			</div>
			<div class="col-6 col-sm-8  col-lg-8">
				<h1 class="text-center">Geek-Store</h1>
				<!-- dar texto y con el text acomodar a dodne querramos -->
			</div>
		</div>
		<div class="row mt-3">
			<div class="col">
				<div class="card">
				<!-- 	<h5 class="card-header">Bienvenido perron</h5> -->
					<div class="card-body">
						<!-- cards para ordenar la pagina -->
					<?php include "presentacion/cliente/productosDisponibles.php" ?> 
						<!-- se adapta al tamaño del card -->
					</div>
				</div>
			</div>
		
					
				</div>
			</div>
	

