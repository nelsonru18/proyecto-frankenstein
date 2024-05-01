<?php 
include('baseda.php');
$ID=$_POST['entrada'];
$NOMBRETRA=$_POST['almacenista'];
$NOMBREPRO=$_POST['producto'];
$CANTIDADSAL=$_POST['cantidad'];


$registrar= "UPDATE `entrada` SET `almacenista_idalmacenista`='$NOMBRETRA',`producto_id`='$NOMBREPRO',`cantidadent`='$CANTIDADSAL' WHERE `identrada`='$ID'";
$resultado= mysqli_query($conection, $registrar);


if(!$resultado){
    echo'
        <script>
        alert("ERROR AL ACTUALIZAR");
        window.location="../LOGIN-REGISTER/Actualizar_Producto.php";
        </script>';
}else{
    echo'
        <script>
        alert("PRODUCTO ACTUALIZADO CORRECTAMENTE");
        window.location="javascript:history.back()";
        </script>';
        
    
}
mysqli_close($conection);

?>