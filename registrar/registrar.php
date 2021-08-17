
    <!--Database-->
        <?php
            include("../database/dbc.php");
        ?>
    <!--Database-->

    <!--Query de registro-->
    <?php

        session_start();

        if(isset($_SESSION["id_usuario"])) {
            header("Location: ../index/index.php");
        }

        if(isset($_POST["registro"])) {
            $nombre = $_POST["nombre"];

            if(empty($nombre)) {
                $mensaje_nombre = "Escriba un nombre";
            }

            if(strlen($nombre) > 15) {
                $mensaje_long_nombre = "La longitud del nombre es demasiado larga";
            }

            $email = $_POST["email"];

            if(empty($email)) {
                $mensaje_email = "Escriba un email";
            }

            $password = $_POST["password"];
            $confirm_password = $_POST["confirm-password"];

            $correo_existente = "SELECT * FROM login WHERE email = '$email'";
            $query = mysqli_query($conexion, $correo_existente);

            if(empty($password) || empty($confirm_password)) {
                $mensaje_password = "Escriba una contraseña";
            } elseif($password != $confirm_password) {
                $mensaje_coinicide = "Las contraseñas no coinciden";
            } elseif($row = mysqli_fetch_assoc($query)) {
                $mensaje_correo_existente = "El correo ya se encuentra registrado";
            } elseif(!empty($nombre) && !empty($email) && !empty($password) && !empty($confirm_password)) {
                $password = password_hash($_POST["password"], PASSWORD_BCRYPT); 
                $registro = "INSERT INTO login (nombre, email, contraseña) VALUES ('$nombre', '$email', '$password')";
                $query = mysqli_query($conexion, $registro);
                if($query) {
                    header("Location: ../login/login.php?email=$email");
                } else {
                    $mensaje_error = "Error al registrar";
                }
            }
        }
    ?>
    <!--Query de registro-->

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar</title>

    <!--CSS-->

    <?php
        include("../include/styles-nav-general.html")
    ?>

    <link rel="stylesheet" href="../login/formulario.css">

    <!--CSS-->

</head>
<body>

    <!--NAV-->

    <?php
        include("../include/nav.html");
    ?>

    <!--NAV-->
    
    <div class="formulario">
        <h2>Registrarse</h2>
        <form action="registrar.php" method="post">
            <input type="name" name="nombre" placeholder="Nombre" value="<?php if(!empty($nombre)) {echo($nombre);} ?>">
            <input type="email" name="email" placeholder="Email" value="<?php if(!empty($email)) {echo($email);} ?>">
            <input type="password" name="password" placeholder="Contraseña">
            <input type="password" name="confirm-password" placeholder="Confirmar contraseña">
            <input type="submit" name="registro" value="Registrarse">
            <p>o <a href="../login/login.php">Iniciar sesión</a></p>
            
            <!--Mensajes-->
            
            <?php
                if(isset($mensaje_nombre)) {
                    ?>
                        <p><?= $mensaje_nombre ?></p>
                    <?php
                }
                if(isset($mensaje_long_nombre)) {
                    ?>
                        <p><?= $mensaje_long_nombre ?></p>
                    <?php
                }
                if(isset($mensaje_email)) {
                    ?>
                        <p><?= $mensaje_email; ?></p>
                    <?php
                }
                if(isset($mensaje_password)) {
                    ?>
                        <p><?= $mensaje_password; ?></p>
                    <?php
                }
                if(isset($mensaje_coinicide)) {
                    ?>
                        <p><?= $mensaje_coinicide; ?></p>
                    <?php
                }
                if(isset($mensaje_error)) {
                    ?>
                        <div class="mensaje bad">
                            <p><?= $mensaje_error; ?></p>
                            <a class="boton"><i class="fas fa-times"></i></a>
                        </div>
                    <?php
                } if(isset($mensaje_correo_existente)) {
                    ?>
                        <div class="mensaje bad">
                            <p><?= $mensaje_correo_existente; ?></p>
                            <a class="boton"><i class="fas fa-times"></i></a>
                        </div>
                    <?php
                }
                ?>

            <!--Mensajes-->

        </form>
    </div>
    <script src="../script/script.js"></script>
</body>
</html>