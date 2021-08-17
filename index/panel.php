<?php 
    $consulta_tabla = "SELECT * FROM login";
    $query_tabla = mysqli_query($conexion, $consulta_tabla);
?>

<div class="usuarios">
    <div class="tabla">
        <h2>ID</h2>
        <h2>Nombre</h2>
        <h2>Email</h2>

        <?php
            while($row = mysqli_fetch_assoc($query_tabla)) {
                ?>
                    <p class="<?php if($row["id"] == $fila["id"]){echo("select"); } ?>"><?= $row["id"] ?></p>
                    <p class="<?php if($row["id"] == $fila["id"]){echo("select"); } ?>"><?= $row["nombre"] ?></p>
                    <p class="<?php if($row["id"] == $fila["id"]){echo("select"); } ?>"><?= $row["email"] ?></p>
                <?php
            }
        ?>

    </div>
</div>