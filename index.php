<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login y Register - MagtimusPro</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="assets/css/estilos.css">
</head>
<body>

        <main>

            <div class="contenedor__todo">
                <div class="caja__trasera">
                    <div class="caja__trasera-login">
                        <h3>¿Ya tienes una cuenta?</h3>
                        <p>Inicia sesión para entrar en la página</p>
                        <button id="btn__iniciar-sesion">Iniciar Sesión</button>
                    </div>
                    <div class="caja__trasera-register">
                        <h3>¿Aún no tienes una cuenta?</h3>
                        <p>Regístrate para que puedas iniciar sesión</p>
                        <button id="btn__registrarse">Regístrarse</button>
                    </div>
                </div>

                <!--Formulario de Login y registro-->
                <div class="contenedor__login-register">
                    <!--Login-->
                    <form action="validar.php" class="formulario__login" method="POST">
                        <h2>Iniciar Sesión</h2>
                        <input name= "correo" type="text" placeholder="Correo Electronico">
                        <input name= "clave" type="password" placeholder="Contraseña">
                        <button value= "entrar" name="entrar">Entrar</button>
                    </form>

                    <!--Register-->
                    <form action="Registro Usuario.php" class="formulario__register" method="POST">
                        <h2>Regístrarse</h2>
                        <input name= "nombres" type="text" placeholder="Nombres">
                        <input name= "apellidos" type="text" placeholder="Apellidos">
                        <input name= "direccion" type="text" placeholder="Direccion">
                        <input name= "telefono" type="text" placeholder="Telefono">
                        <div class="seleccion">
                            <select name="Cargo" id="">
                            <option name= "trabajador" value="trabajador">Trabajador</option>
                            <option name= "almacenista" value="almacenista">Almacenista</option>
                            </select>
                        </div>
                        <input name= "correo_entrada" type="text" placeholder="Correo Electronico">
                        <input name= "clave_entrada" type="password" placeholder="Contraseña">
                        <button name="enviar">Regístrarse</button>
                    </form>
                </div>
            </div>

        </main>

        <script src="assets/js/script.js"></script>
</body>
</html>