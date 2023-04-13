
<?php

$dbhost = "sql306.epizy.com";
$dbuser = "epiz_31575949";
$dbpass = "YsXb4IXpvS0";
$dbname = "epiz_31575949_ingreso";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if (!$conn) 
{
    die("No hay conexion: ".mysqli_connect_error());
}

$usuario = $_POST["usuario"];
$contrasena = $_POST["contrasena"];

$query = mysqli_query($conn,"SELECT * FROM validacion WHERE usuario = '$usuario' and contrasena = '$contrasena'");

$nr = mysqli_num_rows($query);

if($nr==1)
{
    header("location: crud.php");
}
else if ($nr==0) 
{
    echo "<script> alert('Error');window.location= 'login.html' </script>";
}

?>