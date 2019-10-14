<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

</head>
<body>

<?php 

$conexion=mysqli_connect("localhost","root","","indwork") or
    die("Problemas con la conexión");

$registros=mysqli_query($conexion,"select  CV from profesional where CORREO ='$_REQUEST[correo]' or ID='$_GET[id]'") or
  die("Problemas en el select:".mysqli_error($conexion));

if ($reg=mysqli_fetch_array($registros))
{

    if($reg['CV'] == " "){
        echo "<p>No tiene archivos<P>";
    }else{

        header('content-type: application/pdf');
        readfile('cvs/'.$reg['CV']);

    }

}
?>


</body>

</html>