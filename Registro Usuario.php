<?php 
include('baseda.php');
$NOMBRES=$_POST['nombres'];
$APELLIDOS=$_POST['apellidos'];
$DIRECCION=$_POST['direccion'];
$TELEFONO=$_POST['telefono'];
$CORREO=$_POST['correo_entrada'];
$CLAVE=$_POST['clave_entrada'];
$CARGO=$_POST['Cargo'];


if ($CARGO=="trabajador") {
    $insertar= "INSERT INTO trabajador(nombretra, apellidotra, direcciontra, telefonotra, correotra, clavetra) VALUES ('$NOMBRES','$APELLIDOS','$DIRECCION','$TELEFONO','$CORREO',SHA1('$CLAVE'))";
    $resultado= mysqli_query($conection, $insertar);

    if(!$resultado){
        echo'
        <script>
        alert("ERROR AL REGISTRAR USUARIO");
        window.location="../LOGIN-REGISTER/index.php";
        </script>';
    }else{
        echo'
        <script>
        alert("USUARIO TRABAJADOR REGISTRADO CORRECTAMENTE");
        window.location="../LOGIN-REGISTER/index.php";
        </script>';
    }
    mysqli_close($conection);
}
elseif ($CARGO=="almacenista") {
    $insertar= "INSERT INTO almacenista(nombrealm, apellidoalm, direccionalm, telefonoalm, correoalm, clavealm) VALUES ('$NOMBRES','$APELLIDOS','$DIRECCION','$TELEFONO','$CORREO',SHA1('$CLAVE'))"; 
    $resultado= mysqli_query($conection, $insertar);

    
    if(!$resultado){
        echo'
        <script>
        alert("ERROR AL REGISTRAR USUARIO");
        window.location="../LOGIN-REGISTER/index.php";
        </script>';
    }else{
        echo'
        <script>
        alert("USUARIO ALMACENISTA REGISTRADO CORRECTAMENTE");
        window.location="../LOGIN-REGISTER/index.php";
        </script>';
    }
    mysqli_close($conection);
}

?>