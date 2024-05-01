<?php 
include('baseda.php');

$IDTRABAJADOR=$_POST['codigotrab'];
$IDPRODUCTO=$_POST['codigoprod'];
$CANTIDAD=$_POST['cantidad'];
$REGISTRAR=$_POST['registrar'];
$MENU=$_POST['menu'];

date_default_timezone_set('America/Bogota');
$FECHA=date("Y-m-d");
$HORA=date("H:i:s");

if (isset($_POST['menu'])) {
    header("location:../LOGIN-REGISTER/Menu inicio de sesion.php");
    exit();
}
session_start();
$IDALMACENISTA=$_SESSION['nombre'];

$registrar= "INSERT INTO salida(almacenista_idalmacenista,trabajador_idtrabajador, producto_id, cantidadsal, fechasal, horasal) VALUES ('$IDALMACENISTA','$IDTRABAJADOR','$IDPRODUCTO','$CANTIDAD','$FECHA','$HORA')";
$resultado= mysqli_query($conection, $registrar);
if(!$resultado){
    echo'
        <script>
        alert("ERROR AL REGISTRAR");
        window.location="../LOGIN-REGISTER/Salida Producto.html";
        </script>';
}else{
    echo'
        <script>
        alert("SALIDA DE PRODUCTO REGISTRADA CORRECTAMENTE");
        window.location="../LOGIN-REGISTER/Salida Producto.html";
        </script>';
}
mysqli_close($conection);

/*$consulta= "SELECT*FROM usuarios where Correo = '$FECHA' and password = '$PASSWORD' ";
$resultado= mysqli_query($conection, $consulta);

$filas=mysqli_num_rows($resultado);

if($filas){
    header("location:menu inicio de sesion.html");

}else{
    include("index.html");
    ?>
    <h1>ERROR DE AUTENTICACION</h1>
    <?php
}
mysqli_free_result($resultado);
mysqli_close($conection)*/

?>