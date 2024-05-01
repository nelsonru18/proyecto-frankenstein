<?php 
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=3.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie-edge">
        <link rel="stylesheet" href="Estilos/formulario.css">

        <title> Cambiar Contraseña </title>

    </head>
    <body>
        <form action="cambiar_password.php" method="POST" class="form-register">
            <h4>Cambiar Contraseña de usuario</h4>
            <input class="controls" type="password" name="passwordant" id="codigo" placeholder="Escribir Contraseña Anterior">
            <input class="controls" type="password" name="passwordnue" id="nombre" placeholder="Escribir Nueva Contraseña">
            <input class="controls" type="password" name="passwordnuev" id="cantidad" placeholder="Repetir Nueva Contraseña">
            <button id="registrar" type="submit" name="registrar">Registrar</button>
            <button id="cancelar" type="reset" value="borrar">borrar</button>
            <button id="menu" name="menu">Menu Principal</button>
        </form>
    </body>
</html>



<?php
include('baseda.php');

if (isset($_POST['menu'])) {
    header("location:../LOGIN-REGISTER/Menu inicio de sesion.php");
    exit();
}

if (isset($_POST['registrar'])) {

$PASSWORD=$_POST['passwordant'];
$PASSWORDNUE=$_POST['passwordnue'];
$PASSWORDNUEV=$_POST['passwordnuev'];
    

if($PASSWORDNUE==$PASSWORDNUEV){

$consulta= "SELECT*FROM almacenista where clavealm = SHA1('$PASSWORD')";
$resultado= mysqli_query($conection, $consulta);
$filas=mysqli_num_rows($resultado);

while ($filas = $resultado->fetch_array()) {

$filas1=$filas['idalmacenista'];
    
if($filas){

$registrar= "UPDATE `almacenista` SET `clavealm` = SHA1('$PASSWORDNUE') WHERE `idalmacenista` ='$filas1'";
$resultado1= mysqli_query($conection, $registrar);


if(!$resultado1){
    echo'
        <script>
        alert("CONTRASEÑA ERRONEA");
        window.location="../LOGIN-REGISTER/Actualizar_Producto.php";
        </script>';
}else{
    echo'
        <script>
        alert("SU CONTRASEÑA SE ACTUALIZÓ CORRECTAMENTE");
        window.location="javascript:history.back()";
        </script>';
        
    
}

}else{
    include("cambiar_password.php");
    ?>
    <h1>ERROR DE AUTENTICACION</h1>
    <?php
}

}

}else{
    echo'
        <script>
        alert("CONTRASEÑAS NUEVAS NO SON IGUALES");
        window.location="javascript:history.back()";
        </script>';
        
    
}
mysqli_free_result($resultado);
mysqli_close($conection);
}

?>