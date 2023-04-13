<?php
  	include("conexion.php");
    //se crea una nueva instancia
    $datos= new basedatos();
    //isset() para comprobar si una variable está definida -- !empty si no viene null
    if(isset($_POST) && !empty($_POST)){
        //se llama la función insertar y se le pasan los parámetros del formulario
        $res = $datos->insertar_reservas($_POST['nombre'],$_POST['celular'],$_POST['email'],$_POST['presupuesto'],$_POST['destino'],$_POST['observaciones'],$_POST['fecha']);
        //si el resultado es true, quiere decir que insertó en la tabla de la base de datos
        if($res){
        //se configura el mensaje 
        echo'<script type="text/javascript">
            alert("Información enviada correctamente");
            window.location.href="listar.php";
            </script>';
        }else{
        echo'<script type="text/javascript">
            alert("Error: No se pudo enviar la información");
            </script>';
        }

    } //fin IF    

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="css/styles.css">
	<link href="https://fonts.googleapis.com/css?family=Krona+One|Poppins&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="icon" href="img/favicon.png" type="image/png" />

	<title>-CRUD La Licoreria-</title>
</head>

<body>


	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
        <a class="navbar-brand" href="index.html">
            <img class="logo"src="img/logo.png" alt="">
            </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.html">Inicio <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="somos.html">Somos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="productos.html">Productos</a>
              </li>
            <li class="nav-item">
                <a class="nav-link" href="video.html">Video</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="login.html">Login</a>
              </li>
            
          </ul>
        </div>
    </div> 
      </nav>
	
<br>
<br>

<main id="main-formulario" class="d-flex justify-content-center">
	

	<section class="contenedor">
		<div class="contenedor-form">
			<form class="bg-white formulario border border-black border-3 shadow-lg p-3 mb-5 bg-body rounded" method="post">
			  <div class="form-group">
			    <label for="nombre">Nombre Cliente</label>
			    <input type="text" class="form-control" id="nombre" name="nombre"  placeholder="Ingrese Nombre" required>
			  </div>
			  <div class="form-group">
			    <label for="celular">Celular Cliente</label>
			    <input type="text" class="form-control" id="celular" name="celular"  placeholder="Ingrese Celular" required>
			  </div>
			  <div class="form-group">
			    <label for="email">Correo Electrónico</label>
			    <input type="email" class="form-control" id="email" name="email" placeholder="nombre@example.com" required>
			  </div>
			  <div class="form-group">
			  <label for="presupuesto">Precio</label>
				<input type="text" class="form-control" id="presupuesto" name="presupuesto"  placeholder="Ingrese Precio" required>
			    </select>
			  </div>
			  <div class="form-group">
			    <label for="destino">Producto</label>
				<input type="text" class="form-control" id="destino" name="destino"  placeholder="Ingrese Producto" required>
			    </select>
			  </div>

			  <div class="form-group">
			    <label for="fecha">Fecha del Pedido</label>
			    <input type="date" class="form-control" id="fecha" name="fecha"  required>
			  </div>

			  <div class="form-group">
			    <label for="Observaciones">Direccion Cliente</label>
			    <textarea class="form-control" id="observaciones" name="observaciones" rows="2"></textarea>
			  </div>
			  <center>
			  <button type="submit" class="btn btn-success">Enviar</button>
			  <button class="btn btn-warning" onclick="window.location.href='listar.php'">Listar</button>

			  </center>
			 </form>

</main>

		</div>
	</section>

	<br>


	
</body>
</html>