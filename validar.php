
<?php 
session_start();
include('baseda.php');
$USUARIO=$_POST['correo'];
$PASSWORD=$_POST['clave'];


$consulta= "SELECT*FROM almacenista where correoalm = '$USUARIO' and clavealm = SHA1('$PASSWORD') ";
$resultado= mysqli_query($conection, $consulta);
$filas=mysqli_num_rows($resultado);
$filas = $resultado->fetch_array();
  
if($filas){

$_SESSION['nombre']=$filas['idalmacenista'];
header("location:Menu inicio de sesion.php");

}else{
    ?>
    <h1>ERROR DE AUTENTICACION</h1>
    <?php
}

mysqli_free_result($resultado);
mysqli_close($conection)

?>