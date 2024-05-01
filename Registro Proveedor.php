<?php 
include('baseda.php');
session_start();
$NOMBRE=$_POST['nombre'];
$DIRECCION=$_POST['direccion'];
$TELEFONO=$_POST['telefono'];
$IDALMACENISTA=$_SESSION['nombre'];
$REGISTRAR=$_POST['registrar'];
$MENU=$_POST['menu'];

echo $IDALMACENISTA;

if (isset($_POST['menu'])) {
    header("location:../LOGIN-REGISTER/Menu inicio de sesion.php");
    exit();
}

$registrar= "INSERT INTO proveedor(nombre, direccion, telefono, almacenista_idalmacenista) VALUES ('$NOMBRE','$DIRECCION','$TELEFONO','$IDALMACENISTA')";
$resultado= mysqli_query($conection, $registrar);
if(!$resultado){
    echo'
        <script>
        alert("ERROR AL REGISTRAR");
        window.location="../LOGIN-REGISTER/Registro Proveedor.html";
        </script>';
}else{
    echo'
        <script>
        window.location="../LOGIN-REGISTER/Registro Proveedor.html";
        alert("PRODUCTO REGISTRADO CORRECTAMENTE");
        </script>';
}
mysqli_free_result($resultado);
mysqli_close($conection)

?>