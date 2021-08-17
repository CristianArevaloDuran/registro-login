<!--DataBase-->
<?php
    include("../database/dbc.php");
?>
<!--DataBase-->

<!--Sesion-->
<?php
        session_start();

        if(isset($_SESSION["id_usuario"])) {
            $consulta = "SELECT * FROM login WHERE id = '$_SESSION[id_usuario]'";
            $query = mysqli_query($conexion, $consulta);
            $fila = mysqli_fetch_assoc($query);
        }
    ?>
<!--Sesion-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel</title>

    <!--CSS-->

    <?php
        include("../include/styles-nav-general.html")
    ?>
    
    <link rel="stylesheet" href="panel.css">

    <!--CSS-->

</head>
<body>

    <!--NAV-->

    <?php
        include("../include/nav.html");
    ?>

    <!--NAV-->

    <!--Sesion-->

    <div class="panel">
    <?php
        if(!empty($fila)) {
            ?>
            <p>Bienvenido <?= $fila["nombre"]; ?></p>
            <div class="panel-links">
                <a href="../cerrar/cerrar-sesion.php">Cerrar sesión</a>
            </div>
            <?php
    ?>

    <?php
       } else {
    ?>

        <p>No has iniciado sesión.</p>
        <div class="panel-links">
            <a href="../login/login.php">Iniciar sesión</a>
            <a href="../registrar/registrar.php">Registrarse</a>
        </div>
    <?php
        }
    ?>
    </div>

    <!--Sesion-->


</body>
</html>