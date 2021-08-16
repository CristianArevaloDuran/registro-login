<!DOCTYPE html>
<html lang="en">
<head>
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
        <form action="" method="post">
            <input type="email" name="email" placeholder="Email">
            <input type="password" name="contraseña" placeholder="Contraseña">
            <input type="submit" name="login" value="Iniciar sesión">
            <p>o <a href="../registrar/registrar.php">Registrar</a></p>
        </form>
    </div>

</body>
</html>