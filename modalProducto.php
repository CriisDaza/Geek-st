<?php
require_once "logica/Admin.php";
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
        ?>
	</table>
</div>