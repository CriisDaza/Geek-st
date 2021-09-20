<?php
include "presentacion/menuAdmin.php";
$cliente = new Cliente();
$clientes = $cliente -> ConsultarTodos();
?>
<div class="container">
	<div class="row mt-3">
		<div class="col">
			<div class="card">
				<h5 class="card-header">Consultar Cliente</h5>
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
                            foreach ($clientes as $clienteActual) {
                                echo "<tr>";
                                echo "<td>" . $pos ++ . "</td>
                                      <td>" . $clienteActual -> getNombre() . "</td>
                                      <td>" . $clienteActual -> getApellido() . "</td>
                                      <td>" . $clienteActual -> getCorreo() . "</td>
                                      <td>" . ((($clienteActual -> getEstado()==1)?"<div id='capaEstado" . $clienteActual -> getId() . "'>Activo</div>":"<div id='capaEstado" . $clienteActual -> getId() . "'>Deshabilitados</div>")) . "</td>
                                      <td nowrap>" . (($clienteActual -> getEstado()==0)?"<a href='#'><i id='capaIcono" . $clienteActual -> getId() . "' class='fas fa-user-times'></i></a>":(($clienteActual -> getEstado()==1)?"<a href='#'><i id='capaIcono" . $clienteActual -> getId() . "' class='fas fa-user-check'></i></a>":"")) . " </td>";
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
foreach ($clientes as $clienteActual) {
        echo "$('#capaIcono" . $clienteActual -> getId() . "').click(function() {\n";
        echo "\tvar url = 'indexAjax.php?pid=" . base64_encode("presentacion/cliente/cambiarEstadoClienteAjax.php") . "&id=" . $clienteActual -> getId() . "';\n";
        echo "\t$('#capaEstado" . $clienteActual -> getId() . "').load(url);\n";
        echo "\tif($('#capaIcono" . $clienteActual -> getId() . "').attr('class') == 'fas fa-user-times'){\n";
        echo "\t\t$('#capaIcono" . $clienteActual -> getId() . "').attr('class', 'fas fa-user-check');\n";
        echo "\t}else{\n";
        echo "\t\t$('#capaIcono" . $clienteActual -> getId() . "').attr('class', 'fas fa-user-times');\n";
        echo "\t}\n";
        echo "});\n";        
    
}
?>
</script>