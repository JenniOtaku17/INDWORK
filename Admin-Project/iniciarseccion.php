<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="x-ua-compatible" content="ie-edge">
<link rel="shortcut icon" href="icono.png" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/alertify.min.js"></script>
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/alertify.min.css"/>
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/themes/default.min.css"/>
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/themes/semantic.min.css"/>
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/themes/bootstrap.min.css"/>
<title>Inicio</title>
<nav class="navbar navbar-default bg-dark">
  <img src="img/logo.png" height="50px" width="220px" />
  <ul class="navbar nav justify-content-end text-white">

    <li class="nav-item">
      <a class="nav-link" href="resgistrar.html">Registrarse</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Visitante</a>
    </li>
     <li class="nav-item" >
      <a class="nav-link" href="inicio.html">Inicio</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="cerrarsession.php"><img src="cerrar.png" height="40px" width="40px" alt="Cerrar Session"/></a>
    </li>
  </ul>

</nav>
</head>
<br>
<br>

<body>



<section class="container" align="center">

<?php
session_start();
error_reporting(0);
$conexion=mysqli_connect("localhost","root","","INDWORK") or
    die("Problemas con la conexión");

$registros=mysqli_query($conexion,"select ID, CEDULA,NOMBRE,FOTO,PASSWORD,OFICIO,APELLIDO,TELEFONO,DIRECCION, REGION, ME from PROFESIONAL where CORREO ='$_REQUEST[correo]' or ID='$_GET[id]'") or
  die("Problemas en el select:".mysqli_error($conexion));


while ($reg=mysqli_fetch_array($registros))
{
	$_SESSION['id']= $reg['ID'];

	$id= $reg['ID'];
	if($_REQUEST['password']== $reg['PASSWORD'] or  isset($_REQUEST['id'])){

		echo "<script>swal('Bienvenid@ a tu Perfil ".$reg['NOMBRE']."');</script>";
		echo '<div class="container">
	<div class="d-flex justify-content-center">
	<div class="card" style="width:350px">
			<img class="card-img-top" height="220px" width="170px" src="data:image/jpg;base64,'.base64_encode($reg['FOTO']).'"/>

		<div class="card-body">
		<h4 class="card-title">'.$reg['NOMBRE'].' '.$reg['APELLIDO'].'</h4><br>
		<p class="card-text">CEDULA: '.$reg['CEDULA'].'<br>
		OFICIO: '.$reg['OFICIO'].'<br>
		TELEFONO: '.$reg['TELEFONO'].'<br>
		DIRECCION: '.$reg['DIRECCION'].'<br>
		PAIS: '.$reg['PAIS'].'<br>
		REGION: '.$reg['REGION'].'<br>
		ACERCA DE MI: '.$reg['ME'].'<br></p>
		<a href="#?id='.$id.'" class="btn btn-primary">EDITAR PERFIL</a>

		</div>
		</div>
		</div>
	</div>';
		


	}else{

		echo "<script> alertify.alert('INDWORK aviso','No fue posible iniciar sesion, verifica los datos!', function(){ alertify.message('OK'); window.location= 'iniciarseccion.html'; }); </script>";


			}

}
?>

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
