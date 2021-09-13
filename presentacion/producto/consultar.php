<?php
include 'presentacion/menuAdmin.php';

$atributo = "";
$direccion = "";
$filas = 5;
$pag = 1;

if (isset($_GET["atributo"])) {
    $atributo = $_GET["atributo"];
}
if (isset($_GET["direccion"])) {
    $direccion = $_GET["direccion"];
}
if (isset($_GET["pag"]) && $_GET["pag"] > 0) {
    $pag = $_GET["pag"];
}
if (isset($_GET["filas"])) {
    $filas = $_GET["filas"];
}

$producto = new Producto();
$productos = $producto->ConsultarTodos($atributo, $direccion, $filas, $pag);
$totalFilas = $producto->ConsultarTotalFilas();
?>

<div class="container">
	<div class="row mt-3">
		<div class="col">
			<div class="card">
				<h5 class="card-header">Productos</h5>
				<div class="card-body">
					<div class="row">
						<div class="col-2">
							Resultados: <select class="form-select" id="filas">

								<option value="5" <?php if($filas == 5) echo "selected"?>>5</option>
								<option value="10" <?php if($filas == 10) echo "selected"?>>10</option>
								<option value="20" <?php if($filas == 20) echo "selected"?>>20</option>
								<option value="50" <?php if($filas == 50) echo "selected"?>>50</option>
							</select>
						</div>
					</div>
					
					<table class="table table-striped table-hover">
					<thead>
					<tr>
					<th>#</th>
					<th>Nombre
					<?php 
								echo ($atributo!="nombre" || $direccion!="asc")?"<a href='index.php?pid=" . base64_encode("presentacion/producto/consultar.php") . "&atributo=nombre&direccion=asc&filas=" . $filas . "'><i class='fas fa-sort-amount-up-alt'></i></a> ":"<i class='fas fa-sort-up'></i> ";
								echo ($atributo!="nombre" || $direccion!="desc")?"<a href='index.php?pid=" . base64_encode("presentacion/producto/consultar.php") . "&atributo=nombre&direccion=desc&filas=" . $filas . "'><i class='fas fa-sort-amount-down-alt'></i></a> ":"<i class='fas fa-sort-down'></i> ";
								?>	
					<th>Precio
					<?php 
								echo ($atributo!="precio" || $direccion!="asc")?"<a href='index.php?pid=" . base64_encode("presentacion/producto/consultar.php") . "&atributo=precio&direccion=asc&filas=" . $filas . "'><i class='fas fa-sort-amount-up-alt'></i></a> ":"<i class='fas fa-sort-up'></i> ";
								echo ($atributo!="precio" || $direccion!="desc")?"<a href='index.php?pid=" . base64_encode("presentacion/producto/consultar.php") . "&atributo=precio&direccion=desc&filas=" . $filas . "'><i class='fas fa-sort-amount-down-alt'></i></a> ":"<i class='fas fa-sort-down'></i> ";
								?>
					</th>
								<th>Cantidad</th>
								<th>Imagen</th>
								<th>Administrador</th>
								<th>Marca</th>
								<th>Tipo</th>
								<th></th>
								</tr>
								</thead>
								<tbody>
								<?php 
								$pos=1;
								foreach ($productos as $productoActual){
								    echo "<tr>";
								    echo "<td>" . $pos ++ . "</td>
                                      <td>" . $productoActual -> getNombre() . "</td>
                                      <td>" . $productoActual -> getPrecio() . "</td>
                                      <td>" . $productoActual -> getCantidad() . "</td>
                                      <td>" . (($productoActual -> getImagen()!="")?"<img src='" . $productoActual -> getImagen() . "' height='40px' />":"") . "</td>
                                      <td>" . $productoActual -> getAdmin() -> getNombre() . " " . $productoActual -> getAdmin() -> getApellido() . "</td>
                                      <td>" . $productoActual -> getMarca() -> getNombre() . "</td>
                                      <td>" . $productoActual -> getTipoproducto() -> getNombre() . "</td>
                                      <td nowrap> <a href='modalProducto.php?id=" . $productoActual -> getId() . "' data-bs-toggle='modal' data-bs-target='#modalProducto'><i class='fas fa-eye'></i></a> <a href='index.php?pid=" . base64_encode("presentacion/producto/editarImagenProducto.php") . "&id=" . $productoActual -> getId() . "' data-bs-toggle='tooltip' data-bs-placement='top' title='Editar imagen'><i class='far fa-image'></i></a></td>";
								    echo "</tr>";
								}
								?>
								</tbody>
					</table>
					<nav aria-label="Page navigation example">
					<ul class="pagination justify-content-center"> 
					<?php 
							$numPags = intval($totalFilas/$filas);
							if($totalFilas%$filas != 0){
							    $numPags++;
							}							
							echo ($pag!=1)?"<li class='page-item'><a class='page-link' href='index.php?pid=" . base64_encode("presentacion/producto/consultar.php") . "&pag=" . ($pag-1) . "&filas=" . $filas . (($atributo!="" && $direccion!="")?("&atributo=".$atributo."&direccion=".$direccion):"") . "'> <span aria-hidden='true'>&laquo;</span></a></li>" : "<li class='page-item disabled'><a class='page-link'>&laquo;</li></a>";
							for($i=1; $i<=$numPags; $i++){
							    echo "<li class='page-item " . (($pag==$i)?"active":"") . "'>" . (($pag!=$i)?"<a class='page-link' href='index.php?pid=" . base64_encode("presentacion/producto/consultar.php") . "&pag=" . $i . "&filas=" . $filas . (($atributo!="" && $direccion!="")?("&atributo=".$atributo."&direccion=".$direccion):"") . "'>" . $i . "</a>":"<a class='page-link'>" . $i . "</a>") . "</li>";
							}
							echo ($pag!=$numPags)?"<li class='page-item'><a class='page-link' href='index.php?pid=" . base64_encode("presentacion/producto/consultar.php") . "&pag=" . ($pag+1) . "&filas=" . $filas . (($atributo!="" && $direccion!="")?("&atributo=".$atributo."&direccion=".$direccion):"") . "'> <span aria-hidden='true'>&raquo;</span></a></li>" : "<li class='page-item disabled'><a class='page-link'>&raquo;</li></a>";
							?>		
					</ul>
					</nav>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
$("#filas").change(function() {
	var filas = $("#filas").val(); 
	var url = "index.php?pid=<?php echo base64_encode("presentacion/producto/consultar.php") ?>&filas=" + filas;
	<?php if($atributo!="" && $direccion!="") { ?>
	url += "&atributo=<?php echo $atributo ?>&direccion=<?php echo $direccion ?>";	
	<?php } ?>
	location.replace(url);  	
});
</script>

<div class="modal fade" id="modalProducto" tabindex="-1"
	aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">

		</div>
	</div>
</div>

<script>
	$('body').on('show.bs.modal', '.modal', function (e) {	    
		var link = $(e.relatedTarget);
		$(this).find(".modal-content").load(link.attr("href"));
	});
</script>


