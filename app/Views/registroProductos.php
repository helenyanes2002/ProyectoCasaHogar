<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animalandia</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Gochi+Hand&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="<?= base_url('public/styles/estilos.css') ?>">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Delius+Swash+Caps&display=swap" rel="stylesheet">
</head>
<body>

    <header>
		<nav class="navbar navbar-expand-lg navbar-dark fondoPrincipal">
			<div class="container-fluid">
				<a class="navbar-brand fuente" href="#">
					<i class="fas fa-paw"></i>
					Animalandia
				</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav me-auto mb-2 mb-lg-0">
						<li class="nav-item">
							<a class="nav-link" aria-current="page" href="<?= site_url('/')?>">Home</a>
						</li>
						<li class="nav-item">
							<a class="nav-link active" href="#">Registro Productos</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?= site_url('registro/animales')?>">Registro Animales</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?= site_url('/producto/buscar')?>">Lista de productos</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?= site_url('/animal/buscar')?>">Lista de animales</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
	</header>

    <main>
        <div class="container mb-5">
             <div class="row mt-5 d-flex justify-content-center">
                <div class="col-12 col-md-5">
                    <h3 class="fuente2 fw-bold text-center">Registro de productos</h3>
                    <form action="<?= site_url('/registro/productos/nuevo') ?>" method="POST" class="mt-4">
                        <div class="mb-3">
                            <label class="form-label">Producto:</label>
                            <input type="text" class="form-control" name="producto">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Fotografía:</label>
                            <input type="text" class="form-control" name="foto">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Precio Unidad:</label>
                            <input type="number" class="form-control" name="precio">
                        </div>
                        <div class="mb-3">
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Descripcion" name="descripcion" style="height: 100px"></textarea>
                                <label for="floatingTextarea">Descripción</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tipo de animal:</label>
                            <select class="form-select" name="tipoAnimal">
                                <option value="1" selected>Perro</option>
                                <option value="2">Gato</option>
                                <option value="3">Ave</option>
                                <option value="4">Caballo</option>
                                <option value="5">Reptil</option>
                            </select>
                        </div>
                    	<div class="d-grid gap-2">
                            <button class="btn boton" type="submit">Registrar</button>
                        </div>  
                    </form>
                </div>
                <div class="col-12 col-md-5 align-self-end">
                    <img src="<?= base_url('public/img/registro1.png')?>" alt="imagen" class="img-fluid w-100">
                </div>
            </div>
        </div>
    </main>

	<section>
		<?php if(session('mensaje')):?>
			<div class="modal fade" id="modal" tabindex="-1">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header fondoPrincipal text-white">
							<h5 class="modal-title">Animalandia</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
						</div>
						<div class="modal-body">
							<div class="row d-flex justify-content-center">
								<div class="col-8">
									<h5><?= session('mensaje') ?></h5>
									<i class="fas fa-exclamation-triangle fa-5x text-center"></i>
								</div>
							</div>
							
						</div>
					</div>
				</div>
			</div>
		<?php endif ?>
	</section>
    
    <footer class="fondoDos p-5">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12 col-md-4">
					<h3 class="fw-bold">Horario de atención:</h3>
					<p>Lunes a viernes 7:00 am - 3:00 pm / Sábado: 7:00 am - 2:30 pm / Domingos y festivos 8:00 am - 3:00 pm</p>
					<br>
					<h3 class="fw-bold">Dirección:</h3>
					<p>Belén Altavista Calle 8A # 112-82 </p>
				</div>

				<div class="col-12 col-md-4">
					<h3 class="fw-bold">Ayudas:</h3>
					<p>Glosario / Correo remoto  /  Monitoreo y desempeño de uso del sitio web</p>
					<br>
					<h3 class="fw-bold">Protección de datos:</h3>
					<p>Protección de datos personales en el Municipio de Medellín </p>
				</div>

				<div class="col-12 col-md-4">
					<h1 class="fw-bold fuente"><span><i class="fas fa-paw"></i></span>ANIMALANDIA</h1>
					<br>
					<i class="fab fa-facebook fa-3x"></i>
					<i class="fab fa-instagram fa-3x"></i>
					<i class="fab fa-youtube fa-3x"></i>
					<br>
					<p class="mt-4">© 2021 / NIT: 890905211-1 / Código DANE: 05001 / Código Postal: 050015</p>		
				</div>
			</div>
		</div>		
	</footer>

	<script type="module" src="<?= base_url('public/js/lanzarmodal.js') ?>" ></script>
    <script src="https://kit.fontawesome.com/7b642ec699.js" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>