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
</head>

<body>

<?php
$conexion=mysqli_connect("localhost","root","","INDWORK") or
die("Problemas con la conexión");

//error_reporting(0);
$id = $_GET['id'];
session_start();
$var= $_SESSION['id'];
?>

<nav class="navbar navbar-default bg-dark">
  <img src="img/logo.png" height="50px" width="220px" />
  <ul class="navbar nav justify-content-end text-white">
    <li class="nav-item" >
      <a class="nav-link" href="#">Visitante</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="inicio.html">Inicio</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="iniciarseccion.php?id=<?php echo $id ?>">Mi Perfil</a>
    </li>
      <li class="nav-item">
      <a class="nav-link" href="cerrarsession.php"><img src="cerrar.png" height="40px" width="40px" alt="Cerrar Session"/></a>
    </li>
  </ul>

</nav><br><br>
<section class="container" align="center">

<?php


if( empty($var)){
	echo "<script> alertify.alert('INDWORK aviso','Debes iniciar sesion para tener acceso a esta pagina!', function(){ alertify.message('OK'); window.location= 'iniciarseccion.html'; }); </script>";

}
else{
$registros=mysqli_query($conexion,"select CEDULA, NOMBRE, APELLIDO, OFICIO, PAIS, FOTO, TELEFONO,DIRECCION, CORREO, PASSWORD, REGION, ME from profesional
                        where ID='$id'") or
  die("Problemas en el select:".mysqli_error($conexion));
if ($reg=mysqli_fetch_array($registros))
{
?>
<div class="container">
<div class="d-flex justify-content-center">	
<div class="form-group w-75 justify-content-center">
	<h1 align="center">MODIFICAR DATOS</h1><br>

  <div class="d-flex justify-content-center">
  <div class="p-2">
<div class="card" style="width:180px">
<img class="card-img-top" src="img/fotoperfil.png" alt="Card image">
<div class="card-body">
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#imgmodal">Foto</button>
</div>
</div>
<!-- Modal -->
<div id="imgmodal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Foto de Perfil</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
	  <form action="editarfotoperfil.php?id=<?php echo $id ?>" method="post"  enctype="multipart/form-data">
	  <input type="file" name="foto" accept="image/*"/><br><br>
      </div>
      <div class="modal-footer">
      <a href="editarfotoperfil.php?id=<?php echo $id ?>"><button class="btn btn-primary">GuardarCambios</button></a>
</form>
	</div>
    </div>
</div>
  </div>
</div>

<div class="p-2">
<div class="card" style="width:180px">
<img class="card-img-top" src="img/pdf.png" alt="Card image">
<div class="card-body">
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#cvmodal">CV</button>
</div>
</div>
<!-- Modal -->
<div id="cvmodal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
      <h4 class="modal-title">Cambiar CV</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
	  <form action="cambiarcv.php?id=<?php echo $id ?>" method="post"  enctype="multipart/form-data">
	  <label>Tu Curriculum:</label>
    <input style="border: 2px dotted #169BD5; padding: 5px;" class="archivo" type="file" name="cv" accept="application/pdf" /><br><br>

	</div>
      <div class="modal-footer">
		<a href="cambiarcv.php?id=<?php echo $id ?>"><button class="btn btn-primary">GuardarCambios</button></a>
	  </form>
	</div>
    </div>
</div>
  </div>
</div>


<div class="p-2">
<div class="card" style="width:180px">
<img class="card-img-top" src="img/info.png" alt="Card image">
<div class="card-body">
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#infomodal">Personales</button>
</div>
</div>
<!-- Modal -->
<div id="infomodal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
      <h4 class="modal-title">Informacion Personal</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
	  <form action="editarinfo.php?id=<?php echo $id ?>" method="post"  enctype="multipart/form-data">
	  <label>Ingrese la Cedula:</label>
		<input type="text" name="cedula" class="form-control" value="<?php echo $reg['CEDULA'] ?>"><br>

		<label>Ingrese el Nombre:</label>
		<input type="text" name="nombre" class="form-control" value="<?php echo $reg['NOMBRE'] ?>"><br>

		<label>Ingrese el Apellido:</label>
		<input type="text" name="apellido" class="form-control" value="<?php echo $reg['APELLIDO'] ?>"><br>

		<label>Ingrese el Telefono:</label>
		<input type="text" name="telefono" class="form-control" value="<?php echo $reg['TELEFONO'] ?>"><br>

	</div>
      <div class="modal-footer">
		<a href="editarinfo.php?id=<?php echo $id ?>"><button class="btn btn-primary">GuardarCambios</button></a>
	  </form>
	</div>
    </div>
</div>
  </div>

</div>

<div class="p-2">
<div class="card" style="width:180px">
<img class="card-img-top" src="img/infopro.png" alt="Card image">
<div class="card-body">
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#infopromodal">Profesionales</button>
</div>
</div>

<!-- Modal -->
<div id="infopromodal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
      <h4 class="modal-title">Informacion Profesional</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
	  <form action="editarinfopro.php?id=<?php echo $id ?>" method="post"  enctype="multipart/form-data">

		<label>Ingrese el oficio:</label>
		<input type="text" name="oficio" class="form-control" value="<?php echo $reg['OFICIO'] ?>"><br>

		<label>Ingrese informacion sobre ti:</label>
		<input type="text" name="me" class="form-control" value="<?php echo $reg['ME'] ?>"><br>

	</div>
      <div class="modal-footer">
      <a href="editarinfopro.php?id=<?php echo $id ?>"><button class="btn btn-primary">GuardarCambios</button></a>
</form>
	</div>
    </div>
</div>
  </div>
</div></div>

<div class="d-flex justify-content-center">

<div class="p-2">
<div class="card" style="width:180px">
<img class="card-img-top" src="img/localidad.png" alt="Card image">
<div class="card-body">
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#infolocalidadmodal">Localidad</button>
</div>
</div>

<!-- Modal -->
<div id="infolocalidadmodal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
      <h4 class="modal-title">Localidad</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
	  <form action="editarlocalidad.php?id=<?php echo $id ?>" method="post"  enctype="multipart/form-data">

	  <label>Ingrese el pais:</label>
	<input type="text" name="pais" class="form-control" value="<?php echo $reg['PAIS'] ?>"><br>

	<label>Ingrese la region:</label>
	<input type="text" name="region" class="form-control" value="<?php echo $reg['REGION'] ?>"><br>

	<label>Ingrese la direccion:</label>
	<input type="text" name="direccion" class="form-control" value="<?php echo $reg['DIRECCION'] ?>"><br>


	</div>
      <div class="modal-footer">
      <a href="editarlocalidad.php?id=<?php echo $id ?>"><button class="btn btn-primary">GuardarCambios</button></a>
	  </form> 
	</div>
    </div>
</div>
  </div>
</div>

<div class="p-2">
<div class="card" style="width:180px">
<img class="card-img-top" src="img/correo.png" alt="Card image">
<div class="card-body">
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#infoemailmodal">Correo</button>
</div>
</div>

<!-- Modal -->
<div id="infoemailmodal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
      <h4 class="modal-title">Email</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
	  <form action="editarcorreo.php?id=<?php echo $id ?>" method="post"  enctype="multipart/form-data">

	  <label>Ingrese el correo:</label>
	<input type="text" name="correo" class="form-control mb-2 mr-sm-2" value="<?php echo $reg['CORREO'] ?>"><br>


	</div>
      <div class="modal-footer">
      <a href="editarcorreo.php?id=<?php echo $id ?>"><button class="btn btn-primary">GuardarCambios</button></a>
	  </form>
	</div>
    </div>
</div>
  </div>
</div>


<div class="p-2">
<div class="card" style="width:180px">
<img class="card-img-top" src="img/contrasena.png" alt="Card image">
<div class="card-body">
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#infopwmodal">Contrasena</button>
</div>
</div>

<!-- Modal -->
<div id="infopwmodal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
      <h4 class="modal-title">Contrasena</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
	  <form action="editarpw.php?id=<?php echo $id ?>" method="post"  enctype="multipart/form-data">

	  <label>Ingrese la Contrasena Actual:</label>
	<input type="text" name="passwordold" class="form-control mb-2 mr-sm-2" ><br>

	<label>Ingrese la Contrasena Nueva:</label>
	<input type="text" name="passwordnew" class="form-control mb-2 mr-sm-2" ><br>

	<label>Ingrese la Contrasena Nueva Nuevamente:</label>
	<input type="text" name="passwordnew2" class="form-control mb-2 mr-sm-2" ><br>


	</div>
      <div class="modal-footer">
      <a href="editarpw.php?id=<?php echo $id ?>"><button class="btn btn-primary">GuardarCambios</button></a>
      </form></div>
    </div>
</div>
  </div>
</div>
	
</div>
		</div>
</div>
		

		<?php
		
}else{
	echo "Verifica los datos";
}
}
?>

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
