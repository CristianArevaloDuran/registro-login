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

    <div class="panel"> 
        <p>No has iniciado sesión.</p>
        <div class="panel-links">
            <a href="../login/login.php">Iniciar sesión</a>
            <a href="../registrar/registrar.php">Registrarse</a>
        </div>
    </div>


</body>
</html>