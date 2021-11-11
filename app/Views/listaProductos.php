<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?= base_url('public/styles/estilos.css') ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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
							<a class="nav-link" href="<?= site_url('Productos')?>">Registro Productos</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?= site_url('registro/animales')?>">Registro Animales</a>
						</li>
						<li class="nav-item">
							<a class="nav-link active" href="#">Lista de productos</a>
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
        <div class="container mt-5">
            <div class="row row-cols-1 row-cols-md-5 g-4">
                <?php foreach($productos as $producto):?>
                    <div class="col">
                        <div class="card h-100 p-3">
                            <img src="<?=$producto["foto"]?>" class="card-img-top" alt="foto">
                            <div class="card-body">
                                <h6 class="card-title"><?=$producto["id"]?></h6>
                                <h6 class="card-title"><?=$producto["producto"]?></h6>
                                <h6 class="card-title"><?= $producto["precio"] ?></h6>
                                <h6 class="card-title"><?=$producto["descripcion"]?></h6>
                                <h6 class="card-title"><?= $producto["tipo"] ?></h6>
                                <p class="card-text"></p>
                                <a data-bs-toggle="modal" data-bs-target="#confirmacion<?= $producto["id"]?>" href="#" class="btn btn-primary"><i class="far fa-trash-alt"></i></a>
                                <a data-bs-toggle="modal" data-bs-target="#editar<?= $producto["id"]?>" href="#" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                            </div>
                        </div>
                        <section>
                            <div class="modal fade" id="confirmacion<?= $producto["id"]?>" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header fondoPrincipal text-white">
                                            <h5 class="modal-title">Casa Hogar</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                           <p>¿Está seguro de eliminar este producto?</p>
                                           <p><?= $producto["id"]?></p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                            <a href="<?= site_url('/producto/eliminar/'.$producto["id"]) ?>" class="btn btn-danger">Aceptar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <section>
                            <div class="modal fade" id="editar<?= $producto["id"]?>" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header fondoPrincipal text-white">
                                            <h5 class="modal-title">Casa Hogar</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                           <div class="row">
                                               <div class="col-3">
                                                <img src="<?= $producto["foto"] ?>" alt="foto" class="img-fluid w-100">
                                               </div>
                                               <div class="col-9">
                                                    <form action="<?= site_url('/producto/editar/'.$producto["id"]) ?>" method="POST">
                                                        <div class="mb-3">
                                                            <label class="form-label">Producto:</label>
                                                            <input type="text" class="form-control" name="producto" value="<?= $producto["producto"] ?>">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Precio:</label>
                                                            <input type="text" class="form-control" name="precio" value="<?= $producto["precio"] ?>">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Descripcion:</label>
                                                            <input type="text" class="form-control" name="descripcion" value="<?= $producto["descripcion"] ?>">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Tipo:</label>
                                                            <input type="text" class="form-control" name="tipo" value="<?= $producto["tipo"] ?>">
                                                        </div>
                                                        <button class="btn boton" type="submit">Actualizar</button>
                                                    </form>
                                               </div>
                                           </div>
                                        </div>  
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                <?php endforeach ?>
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
    

    <script src="https://kit.fontawesome.com/7b642ec699.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>