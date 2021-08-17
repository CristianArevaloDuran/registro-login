<!--Database-->
<?php
    include("../database/dbc.php");
?>
<!--Database-->

<!--Query inicio de sesión-->
<?php

    session_start();

    if(isset($_SESSION["id_usuario"])) {
        header("Location: ../index/index.php");
    }
    
    if(isset($_POST["login"])) {
        $email = $_POST["email"];
        $password = $_POST["password"];
        if(!empty($email) && !empty($password)) {
            $login = "SELECT * FROM `login` WHERE email = '$email'";
            $query = mysqli_query($conexion, $login);
            if($fila = mysqli_fetch_assoc($query)) {
               if(password_verify($password, $fila["contraseña"])) {
                   $_SESSION["id_usuario"] = $fila["id"];
                   header("Location: ../index/index.php");
               } else {
                   $mensaje_contraseña_incorrecta = "La contraseña es incorrecta";
               }
            } else {
                echo("Error al conectar");
            }
        } else {
            $mensaje_campos_vacios = "Los campos están vacíos";
        }
    }
?>
<!--Query inicio de sesión-->

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    
    <!--CSS-->

    <?php
        include("../include/styles-nav-general.html")
    ?>

    <link rel="stylesheet" href="formulario.css">

    <!--CSS-->

</head>
<body>

    <!--NAV-->

    <?php
        include("../include/nav.html");
    ?>

    <!--NAV-->
    
    <div class="formulario">
        <h2>Iniciar sesión</h2>
        <form action="login.php" method="post">
            <input type="email" name="email" placeholder="Email" value="<?php if(isset($_GET["email"])){echo($_GET["email"]);} if(isset($_POST["email"])){echo($_POST["email"]);} ?>">
            <input type="password" name="password" placeholder="Contraseña">
            <input type="submit" name="login" value="Iniciar sesión">
            <p>o <a href="../registrar/registrar.php">Registrar</a></p>

            <!--Mensaje-->

            <?php
                if(isset($mensaje_contraseña_incorrecta)){
                    ?>
                    <div class="mensaje bad">
                            <p><?= $mensaje_contraseña_incorrecta; ?></p>
                            <a class="boton"><i class="fas fa-times"></i></a>
                        </div>
                    <?php
                }
                if(isset($mensaje_campos_vacios)){
                    ?>
                    <div class="mensaje bad">
                            <p><?= $mensaje_campos_vacios; ?></p>
                            <a class="boton"><i class="fas fa-times"></i></a>
                        </div>
                    <?php
                }
            ?>

            <!--Mensaje-->

        </form>
    </div>
    <script src="../script/script.js"></script>
</body>
</html>