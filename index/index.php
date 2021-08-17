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
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel</title>

    <!--CSS-->

    <?php
        include("../include/styles-nav-general.html")
    ?>
    
    <link rel="stylesheet" href="panel.css">
    <link rel="stylesheet" href="../login/formulario.css">

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
                <a href="../modificar/modificar.php">Modificar cuenta</a>
                <a href="../cerrar/cerrar-sesion.php">Cerrar sesión</a>
            </div>
            <?php
                if(isset($_GET["mensaje"])) {
                    ?>
                        <div class="mensaje ok">
                            <p><?= $_GET["mensaje"]; ?></p>
                            <a class="boton"><i class="fas fa-times"></i></a>
                        </div>
                    <?php
                }
            ?>
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

    <script src="../script/script.js"></script>
</body>
</html>