<?php
include "presentacion/menuAdministrador.php";
if(isset($_POST["crear"])){
    $producto = new Producto("", $_POST["nombre"], $_POST["precio"], $_POST["cantidad"], "", $_SESSION["id"], $_POST["marca"], $_POST["tipoProducto"]);
    $producto -> crear();        
}


?>
<div class="container">
	<div class="row mt-3">
		<div class="col-sm-0 col-md-3"></div>
		<div class="col-sm-12 col-md-6">
			<div class="card">
				<h5 class="card-header">Crear Producto</h5>
				<div class="card-body">
					<?php if (isset($_POST["crear"])) { ?>
					<div class="alert alert-success alert-dismissible fade show"
						role="alert">
						Datos ingresados correctamente.
						<button type="button" class="btn-close" data-bs-dismiss="alert"
							aria-label="Close"></button>
					</div>
					<?php } ?>
					<form action="index.php?pid=<?php echo base64_encode("presentacion/producto/crearProducto.php") ?>" method="post">
					
						<div class="mb-3">
							<label class="form-label">Nombre</label>
							<input type="text" class="form-control" name="nombre" required="required">
						</div>
						<div class="mb-3">
							<label class="form-label">Precio</label>
							<input type="number" class="form-control" name="precio" required="required">
						</div>
						<div class="mb-3">
							<label class="form-label">Cantidad</label>
							<input type="number" class="form-control" name="cantidad" required="required">
						</div>
<!-- 						<div class="mb-3"> -->
<!-- 							<label class="form-label">Imagen</label> -->
<!-- 							<input type="file" class="form-control" name="imagen" > -->
<!-- 						</div> -->
						<div class="mb-3">
							<label class="form-label">Marca</label>
							<select class="form-select" name="marca">
							<?php 
							$marca = new Marca();
							$marcas = $marca -> consultarTodos();
							foreach ($marcas as $marcaActual){
							    echo "<option value='" . $marcaActual -> getId() . "'>" . $marcaActual -> getNombre() . "</option>";
							}							
							?>							
							</select>
						</div>
						<div class="mb-3">
							<label class="form-label">Tipo de Producto</label>
							<select class="form-select" name="tipoProducto">
							<?php 
							$tipoProducto = new TipoProducto();
							$tiposProducto = $tipoProducto -> consultarTodos();
							foreach ($tiposProducto as $tipoProductoActual){
							    echo "<option value='" . $tipoProductoActual -> getId() . "'>" . $tipoProductoActual -> getNombre() . "</option>";
							}							
							?>							
							</select>
						</div>
						<div class="d-grid">
							<button type="submit" name="crear" class="btn btn-primary">Crear</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
