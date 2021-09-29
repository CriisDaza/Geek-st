<?php
include "presentacion/menuAdmin.php";
$admin = new Admin();
$Provs = $admin -> ConsultarProveedores();

?>
<div class="container">
	<div class="row mt-3">
		<div class="col">
			<div class="card">
				<h5 class="card-header">Consultar Proveedor</h5>
				<div class="card-body">					
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th>#</th>
								<th>Nombre</th>
								<th>Apellido</th>
								<th>Correo</th>
								<th>Estado</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<?php
                            $pos = 1;
                            foreach ($Provs as $ProvActual) {
                                echo "<tr>";
                                echo "<td>" . $pos ++ . "</td>
                                      <td>" . $ProvActual -> getNombre() . "</td>
                                      <td>" . $ProvActual -> getApellido() . "</td>
                                      <td>" . $ProvActual -> getCorreo() . "</td>
                                      <td>" . ((($ProvActual -> getEstado()==1)?"<div id='capaEstado" . $ProvActual -> getId() . "'>Activo</div>":"<div id='capaEstado" . $ProvActual -> getId() . "'>Deshabilitado</div>")) . "</td>
                                      <td nowrap>" . (($ProvActual -> getEstado()==0)?"<a href='#'><i id='capaIcono" . $ProvActual -> getId() . "' class='fas fa-user-times'></i></a>":(($ProvActual -> getEstado()==1)?"<a href='#'><i id='capaIcono" . $ProvActual -> getId() . "' class='fas fa-user-check'></i></a>":"")) . " </td>";
                                echo "</tr>";
                            }
                            ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
<?php 

foreach ($Provs as $ProvActual) {
    
        echo "$('#capaIcono" . $ProvActual -> getId() . "').click(function() {\n";
        echo "\tvar url = 'indexAjax.php?pid=" . base64_encode("presentacion/proveedor/cambiarEstadoProvAjax.php") . "&id=" . $ProvActual -> getId() . "';\n";
        echo "\t$('#capaEstado" . $ProvActual -> getId() . "').load(url);\n";
        echo "\tif($('#capaIcono" . $ProvActual -> getId() . "').attr('class') == 'fas fa-user-times'){\n";
        echo "\t\t$('#capaIcono" . $ProvActual -> getId() . "').attr('class', 'fas fa-user-check');\n";
        echo "\t}else{\n";
        echo "\t\t$('#capaIcono" . $ProvActual -> getId() . "').attr('class', 'fas fa-user-times');\n";
        echo "\t}\n";
        echo "});\n";        
    
}
?>
</script>