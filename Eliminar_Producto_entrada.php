<?php 
include('baseda.php');
$ID=$_GET['id'];


$eliminar= "DELETE FROM `entrada` WHERE `identrada`='$ID'";
$resultadoEliminar= mysqli_query($conection, $eliminar);


if(!$resultadoEliminar){
    echo'
        <script>
        alert("PRODUCTO NO ELIMINADO");
        window.location="javascript:history.back()";
        </script>';
}else{
    echo'
        <script>
        alert("PRODUCTO ELIMINADO CORRECTAMENTE");
        window.location="../LOGIN-REGISTER/Consultar_Producto.php";
        </script>';
        
    
}
mysqli_close($conection);

?>