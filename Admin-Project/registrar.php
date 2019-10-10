<!doctype html>
<html>
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="x-ua-compatible" content="ie-edge">
<link rel="shortcut icon" href="icono.png" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/alertify.min.js"></script>
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/alertify.min.css"/>
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/themes/default.min.css"/>
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/themes/semantic.min.css"/>
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/themes/bootstrap.min.css"/>
<title>Documento sin título</title>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
	<nav class="navbar navbar-default bg-dark">
  <img src="img/logo.png" height="50px" width="220px" />
  <ul class="navbar nav justify-content-end text-white">
    <li class="nav-item" >
      <a class="nav-link" href="iniciarseccion.html">Iniciar Seccion</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="resgistrar.html">Registrarse</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="buscar.html">Visitante</a>
    </li>
  </ul>

</nav><br><br>

<?php 


?>

  <?php
  
  if(isset($_POST['registrar'])){

    $nombre = $_FILES['cv']['name'];
    $tipo = $_FILES['cv']['type'];
    $tamanio = $_FILES['cv']['size'];
    $ruta = $_FILES['cv']['tmp_name'];
    $destino = "cvs/".$nombre;
    
}

$conexion=mysqli_connect("localhost","root","","indwork") or
    die("Problemas con la conexión");
try{
$img = addslashes(file_get_contents($_FILES['foto']['tmp_name']));
mysqli_query($conexion,"insert into profesional (NOMBRE,APELLIDO,CEDULA,OFICIO,TIPODEUSUARIO,PAIS,FOTO,CV,TELEFONO,DIRECCION,CORREO,PASSWORD,REGION,ME) values
                       ('$_REQUEST[nombre]','$_REQUEST[apellido]','$_REQUEST[cedula]', '$_REQUEST[oficio]', '$_REQUEST[tipodeusuario]','$_REQUEST[pais]','$img','$nombre', '$_REQUEST[telefono]', '$_REQUEST[direccion]','$_REQUEST[correo]','$_REQUEST[password]','$_REQUEST[region]','$_REQUEST[me]')")
  or die("Problemas en el select".mysqli_error($conexion));

  $correo = $_REQUEST['correo'];
  $asunto = 'BIENVENIDO A INDWORK';
  $mensaje = $_REQUEST['nombre'].' '.$_REQUEST['apellido'].' la familia INDWORK le da una cordial Bienvenida!';
  mail($correo, $asunto , $mensaje);


mysqli_close($conexion);
echo "<script> alertify.alert('INDWORK aviso','Usuario registrado Exitosamente!', function(){ alertify.message('OK'); window.location= 'inicio.html'; }); </script>";
}catch(Exception $e){
	echo "<script> alertify.alert('INDWORK aviso','Error al registrar usuario!', function(){ alertify.message('OK'); window.location= 'resgistrar.html'; }); </script>";
}



?>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
