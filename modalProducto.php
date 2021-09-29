<?php
require_once "logica/Proveedor.php";
require_once "logica/Marca.php";
require_once "logica/TipoProducto.php";
require_once "logica/Producto.php";

$id = $_GET["id"];
$producto = new Producto($id);
$producto->Consultar();
?>
<div class="modal-header">
	<h5 class="modal-title" id="exampleModalLabel"><?php echo $producto -> getNombre() ?></h5>
	<button type="button" class="btn-close" data-bs-dismiss="modal"
		aria-label="Close"></button>
</div>
<div class="modal-body">
	<table class="table table-dark table table-striped table-hover">
        			<?php
        			if ($producto -> getImagen() != "") {
        echo "<tr><td>Imagen</td><td><img src='" . $producto -> getImagen() . "' width='200px' /></td></tr>";
        			}
        			
        echo "<tr><td>Precio</td><td>" . $producto -> getPrecio() . "</td></tr>";
        echo "<tr><td>Cantidad</td><td>" . $producto -> getCantidad() . "</td></tr>";
        echo "<tr><td>Marca</td><td>" . $producto -> getMarca()->getNombre() . "</td></tr>";
        echo "<tr><td>Tipo</td><td>" . $producto ->getTipoproducto()-> getNombre() . "</td></tr>";
        echo "<tr><td>codigo</td><td>" . $id . "</td></tr>";
        ?>
	</table>
	<form action="index.php?pid=<?php echo base64_encode("presentacion/sesionCliente.php")/*."&p=".$id*/ ?>" method="post">

	<div class=row>
	<label class="form-label">Cantidad</label>
	<div class="mb-3 col-6">
		<select class="form-select" name="cantidad">
           <option selected>elegir cantidad</option>
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>

		</select>
		</div>
		<input type="hidden" name="idp" value="<?php echo $id?>">
		<div class="col-6"> <button type="submit" name="agregar" class="btn btn-primary">Añadir al carrito</button></div>
	<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    
     </div>
     </form>
</div>
 <div class="modal-footer">
        </div>
        
  <script>
$("#p").change(function() {
    var p = $("#p").val();
    var url = "index.php?pid=<?php echo base64_encode("presentacion/sesionCliente.php") ?>&p=" + p;
    location.replace(url);
});
    </script>