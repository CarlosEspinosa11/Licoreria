<?php
	      $message='';
		  if (isset($_GET['id'])){
				  $id=intval($_GET['id']);
			  } else {
				  header("location:listar.php");
		  }
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

	<section class="contenedor">
		<div class="contenedor-form">
		
		<?php
			//código para actualizar la tabla proveedores
			include ("conexion.php");
			$reserva= new basedatos();
			//consultar el dato del registro específico por el ID 
			$datos_reserva=$reserva->seleccionar_reserva($id);

			//Se llama en método para actualizar
			if(isset($_POST) && !empty($_POST)){
				//se capturan las variables por el método POST
				$id=intval($_POST['id']);
				$nombre=$_POST['nombre'];
				$celular=$_POST['celular'];
				$email=$_POST['email'];
				$observaciones=$_POST['observaciones'];
				$fecha=$_POST['fecha'];

				//llamar el método de actualizar enviando los parmámetros
				$res = $reserva->actualizar_reserva($id,$nombre,$celular,$email,$observaciones,$fecha);

				//configuración del mensaje
				if($res){
					$message= "Datos actualizados con éxito";
					$class="alert alert-success";
					
				}else{
					$message="Error al actualizar los datos";
					$class="alert alert-danger";
				}

			
			}// fin IF



		?>
        
		<main class="d-flex justify-content-center">

    
			<form class="formulario" method="post">
			  <div class="form-group">
			    <label for="nombre">Nombre Completo</label>
			    <!--En es input se carga el ID de la reserva y se esconde la caja de texto -->
				<input type="hidden" name="id" id="id" class='form-control' value="<?php echo $datos_reserva->lic_id;?>" >
                <input type="text" class="form-control" id="nombre" name="nombre" required value="<?php echo $datos_reserva->lic_nombre;?>" >
			  </div>

			  <div class="form-group">
			    <label for="celular">Celular Cliente</label>
			    <input type="text" class="form-control" id="celular" name="celular" required value="<?php echo $datos_reserva->lic_celular;?>">
			  </div>

			  <div class="form-group">
			    <label for="email">Correo Electrónico</label>
			    <input type="email" class="form-control" id="email" name="email" placeholder="nombre@example.com" required value="<?php echo $datos_reserva->lic_correo;?>">
			  </div>

			  <div class="form-group">
			    <label for="fecha">Fecha del Pedido</label>
			    <input type="date" class="form-control" id="fecha" name="fecha"  required value="<?php echo $datos_reserva->lic_fecha;?>">
			  </div>

			  <div class="form-group">
			    <label for="Observaciones">Direccion Cliente</label>
			    <textarea class="form-control" id="observaciones" name="observaciones" rows="2"> <?php echo $datos_reserva->lic_domicilio;?> </textarea>
			  </div>

			<!-- Se crea un DIV y se le asigna la clase, y se imprime el mensaje -->
			<div class="<?php echo $class?>">
				<?php 
					echo $message;
				?>
			</div>	

			</main>
			


			  <center>
			  	<button type="submit" class="btn btn-info">Actualizar Registro</button>
			  	<a class="btn btn-warning" onclick="window.location.href='listar.php'">Listar Registros</a>
			  </center>

			 </form>
			
		</div>
	</section>

	<br>
	<br>
	<br>

	
		


</body>
</html>