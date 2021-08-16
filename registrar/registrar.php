
    <!--Database-->
        <?php
            include("../database/dbc.php");
        ?>
    <!--Database-->

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
        <form action="" method="post">
            <input type="name" name="nombre" placeholder="Nombre">
            <input type="email" name="email" placeholder="Email">
            <input type="password" name="contraseña" placeholder="Contraseña">
            <input type="password" name="contraseña" placeholder="Confirmar contraseña">
            <input type="submit" name="login" value="Registrarse">
            <p>o <a href="../login/login.php">Iniciar sesión</a></p>
        </form>
    </div>

</body>
</html>