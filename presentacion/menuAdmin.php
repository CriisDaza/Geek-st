<?php
$administrador = new Admin($_SESSION["id"]);
$administrador->consultar();
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<div class="container-fluid">
		<a class="navbar-brand"
			href="index.php?pid=<?php echo base64_encode("presentacion/sesionAdmin.php")?>"><i
			class="fas fa-house-damage"></i></a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse"
			data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown"
			aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNavDropdown">
			<ul class="navbar-nav me-auto mb-2 mb-lg-0">
				<li class="nav-item dropdown"><a class="nav-link dropdown-toggle"
					href="#" id="navbarDropdownMenuLink" role="button"
					data-bs-toggle="dropdown" aria-expanded="false"> Producto </a>
					<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
						<li><a class="dropdown-item"
							href="index.php?pid=<?php echo base64_encode("presentacion/producto/crearProducto.php")?>">Crear</a></li>
						<li><a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("presentacion/producto/consultar.php")?>">Consultar</a></li>
						<li><a class="dropdown-item" href="#">Buscar</a></li>
					</ul></li>
				<li class="nav-item dropdown"><a class="nav-link dropdown-toggle"
					href="#" id="navbarDropdownMenuLink" role="button"
					data-bs-toggle="dropdown" aria-expanded="false"> Cliente </a>
					<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
												<li><a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("presentacion/cliente/consultarCliente.php")?>">Consultar</a></li>
						<li><a class="dropdown-item" href="#">Buscar</a></li>
					</ul></li>
			</ul>

			<ul class="navbar-nav">
				<li class="nav-item dropdown"><a class="nav-link dropdown-toggle"
					href="#" id="navbarDropdown" role="button"
					data-bs-toggle="dropdown" aria-expanded="false">Administrador:
						<?php echo $administrador -> getNombre() . " " . $administrador -> getApellido() ?></a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="#">Editar Perfil</a> <a
							class="dropdown-item" href="#">Cambiar Clave</a>
					</div></li>
				<li class="nav-item"><a class="nav-link"
					href="index.php?sesion=false">Cerrar Sesion</a></li>
			</ul>
		</div>
	</div>
</nav>


