<?php 
include('baseda.php');
session_start();
$IDALMACENISTA=$_SESSION['nombre'];
$IDPRODUCTO=$_POST['codigoprod'];
$CANTIDAD=$_POST['cantidad'];
$PRECIO=$_POST['precio'];
$MENU=$_POST['menu'];
date_default_timezone_set('America/Bogota');
$FECHA=date("Y-m-d");
$HORA=date("H:i:s");


if (isset($_POST['menu'])) {
    header("location:../LOGIN-REGISTER/Menu inicio de sesion.php");
    exit();
}

$registrar= "INSERT INTO entrada(almacenista_idalmacenista, producto_id, cantidadent, precioent, fechaent, horaent) VALUES ('$IDALMACENISTA','$IDPRODUCTO','$CANTIDAD','$PRECIO','$FECHA','$HORA')";
$resultado= mysqli_query($conection, $registrar);

if(!$resultado){
    echo'
        <script>
        alert("ERROR AL REGISTRAR");
        window.location="../LOGIN-REGISTER/Registro Producto.html";
        </script>';
}else{
    echo'
        <script>
        alert("PRODUCTO REGISTRADO CORRECTAMENTE");
        window.location="../LOGIN-REGISTER/Registro Producto.html";
        </script>';
}
mysqli_free_result($resultado);
mysqli_close($conection)

?>