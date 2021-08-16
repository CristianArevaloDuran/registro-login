
    <!--Database-->
        <?php
            include("../database/dbc.php");
        ?>
    <!--Database-->

    <!--Query de registro-->
    <?php
        if(isset($_POST["registro"])) {
            $nombre = $_POST["nombre"];

            if(empty($nombre)) {
                $mensaje_nombre = "Escriba un nombre";
            }

            $email = $_POST["email"];

            if(empty($email)) {
                $mensaje_email = "Escriba un email";
            }

            $password = $_POST["password"];
            $confirm_password = $_POST["confirm-password"];

            if(empty($password) || empty($confirm_password)) {
                $mensaje_password = "Escriba una contraseña";
                if($password != $confirm_password) {
                    $mensaje_coinicide = "Las contraseñas no coinciden";
                }
            }
        }
    ?>
    <!--Query de registro-->

<!DOCTYPE html>
<html lang="en">
<head>
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
            <?php
                if(isset($mensaje_nombre)) {
                    ?>
                        <p><?= $mensaje_nombre ?></p>
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
            ?>
        </form>
    </div>

</body>
</html>