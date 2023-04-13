<?php
  	include("conexion.php");
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
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

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

	
	<div class="container bg-light margin-top">
        <table class="table table-bordered">
            <!--Encabezado de la tabla-->
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NOMBRE</th>
                    <th>CELULAR</th>
                    <th>CORREO</th>    
                    <th>PRECIO</th>    
                    <th>PRODUCTO</th>    
                    <th>DIRECCION</th>    
                    <th>FECHA PEDIDO</th>
                    <th>Acción</th>                          
                          </tr>
                      </thead>

            <!--cuerpo de tabla-->
            <tbody>
                <?php
                    //se crea una instancia
                    $tabla = new basedatos();
                    //se llama a la función leer_tabla() y se guardar en la variable
                    $listado=$tabla->leer_tabla();
                    //se realiza el while y se recorren los registros y se guarda en $row
                    while ($row=mysqli_fetch_object($listado)){
                        //se descomponen los campos de la tabla y se guanda en variables
                        $id=$row->lic_id;
                        $nombre=$row->lic_nombre;
                        $celular=$row->lic_celular;
                        $correo=$row->lic_correo;
                        $presupuesto=$row->lic_precio;
                        $destino=$row->lic_producto;
                        $observaciones=$row->lic_domicilio;
                        $fecha=$row->lic_fecha;
                ?>

                <!--SE IMPRIME LAS FILAS Y COLUMNAS CON LOS DATOS DE LA CONSULTA-->
                <tr>
                    <td> <?php echo $id;  ?> </td>
                    <td> <?php echo $nombre;  ?> </td>
                    <td> <?php echo $celular;  ?> </td>
                    <td> <?php echo $correo;  ?> </td>
                    <td> <?php echo $presupuesto;  ?> </td>
                    <td> <?php echo $destino;  ?> </td>
                    <td> <?php echo $observaciones;  ?> </td>
                    <td> <?php echo $fecha;  ?> </td>
                    <td> 
						<a href="eliminar_reserva.php?id=<?php echo $id;?>" class="delete" title="Eliminar" data-toggle="tooltip"> <i class="material-icons">&#xE92B;</i>  </a>  
						<a href="actualizar_reserva.php?id=<?php echo $id;?>" class="edit" title="Editar" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>

					</td>

                </tr>

                    <?php
                        }//cierre del ciclo while
                    ?>


            </tbody>


        </table>
		<button class="btn btn-warning" onclick="window.location.href='crud.php'">Insertar nuevo</button>

    </div>

    <br>
    <br>
    <br>

</body>
</html>