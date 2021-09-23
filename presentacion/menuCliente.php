<?php
$cliente = new Cliente($_SESSION["id"]);
$cliente -> Consultar();
?>

<nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
	<div class="container-fluid">
		<a class="navbar-brand" href="#">GeekStore   <img src="img/logo.png" alt="" width="40" height="40"></a>
		<form class="d-flex">
				<input class="form-control me-2" type="search" placeholder="Search"
					aria-label="Search">
				<button class="btn btn-outline-light" type="submit">Search</button>
			</form>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse"
			data-bs-target="#navbarScroll" aria-controls="navbarScroll"
			aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
			
			
		<div class="collapse navbar-collapse " id="navbarScroll">
			<ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll"
				style="-bs-scroll-height: 100px;">
				</ul>
		<!-- 	<div class="p-3 bd-highlight"> -->
		<ul>
		<li class="nav-item dropdown"><a class="nav-link  navbar-brand  dropdown-toggle link-light"
					href="#" id="navbarDropdown" role="button"
					data-bs-toggle="dropdown" aria-expanded="false">
						<?php echo $cliente -> getNombre() . " " . $cliente -> getApellido() ?></a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="#">Editar Perfil</a> <a
							class="dropdown-item" href="#">Cambiar Clave</a>
					</div>
					</li></ul>
				<a class="nav-link navbar-brand link-light"
					href="index.php?sesion=false">Cerrar Sesion</a>
				
			<a style="color: white" href="index.php?pid= <?php echo base64_encode("tablaCarrito.php")?>"><i class=' link-light fas fa-cart-plus' ></i>(<?php echo (empty($_SESSION['carrito']))?0:count($_SESSION['carrito']);?>)</a>
			</div>
		<!-- x</div> -->
		
	</div>
</nav>



