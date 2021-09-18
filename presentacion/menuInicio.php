
<nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
	<div class="container-fluid">
		<a class="navbar-brand" href="#">Navbar scroll</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse"
			data-bs-target="#navbarScroll" aria-controls="navbarScroll"
			aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarScroll">
			<ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll"
				style="-bs-scroll-height: 100px;">
				
				
			</ul>
			  <form class="d-flex">
				<input class="form-control me-2" type="search" placeholder="Search"
					aria-label="Search">
				<button class="btn btn-outline-success" type="submit">Search</button>
			</form>
			
			<a class="navbar-brand" href="index.php?pid= <?php echo base64_encode("presentacion/cliente/formularioRegistrar.php")?>"> Crear Cuenta</a>
			<a class="navbar-brand" href="index.php?pid= <?php echo base64_encode("presentacion/formularioIngresar.php")?>"> Ingresar</a>
		</div>
	</div>
</nav>