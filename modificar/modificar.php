<!--DataBase-->
<?php
    include("../database/dbc.php");
?>
<!--DataBase-->

<!--Modificación-->
<?php
    session_start();


    if(!isset($_SESSION["id_usuario"])) {
        header("Location: ../index/index.php");
    } else {
        $consulta_datos = "SELECT * FROM login WHERE id = '$_SESSION[id_usuario]'";
        $query_datos = mysqli_query($conexion, $consulta_datos);
        $fila = mysqli_fetch_assoc($query_datos);
    }

    if(isset($_POST["modificar"])) {
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

        if(empty($password) || empty($confirm_password)) {
            $mensaje_password = "Escriba una contraseña";
        } elseif($password != $confirm_password) {
            $mensaje_coinicide = "Las contraseñas no coinciden";
        } elseif(!empty($nombre) && !empty($email) && !empty($password) && !empty($confirm_password)) {
            $password = password_hash($_POST["password"], PASSWORD_BCRYPT); 
            $actualizar = "UPDATE login SET nombre = '$nombre', email = '$email', contraseña = '$password' WHERE id = '$_SESSION[id_usuario]'";
            $query = mysqli_query($conexion, $actualizar);
            if($query) {
                $mensaje = "Modificación realizada con éxito";
                header("Location: ../index/index.php?mensaje=$mensaje");
            } else {
                $mensaje_error = "Error al modificar";
            }
        }
    }

?>
<!--Modificación-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar</title>
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
        <h2>Modificar datos de <?= $fila["nombre"]; ?></h2>
        <form action="modificar.php" method="post">
            <input type="hidden"  value="Modificación realizada con éxito" name="mensaje">
            <input type="name" name="nombre" placeholder="Nombre" value="<?php if(!empty($fila["nombre"])) {echo($fila["nombre"]);} ?>">
            <input type="email" name="email" placeholder="Email" value="<?php if(!empty($fila["email"])) {echo($fila["email"]);} ?>">
            <input type="password" name="password" placeholder="Contraseña">
            <input type="password" name="confirm-password" placeholder="Confirmar contraseña">
            <input type="submit" name="modificar" value="Modificar">

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

</body>
</html>