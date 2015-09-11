<!DOCTYPE html>
<html>
    <head>
        <title>Usuarios del sistema</title>
        <meta charset="utf-8">
    </head>
    <body>
        <?php if ($usuario) { ?>
            <h1 align="center">Listado de Users Registrados en el Sistema</h1>
            <table border="2" align="center">
                <tr style="font-weight:bolder ">
                    <td width="50" align="center">ID Usuario</td>
                    <td width="100" align="center">Nombre Usuario</td>
                    <td width="120" align="center">Nivel de privilegios</td>
                </tr>
                <?php
                foreach ($usuario->result() as $usua) {
                    if ($usua->nivel_mod == 1) {
                        $nvl = "Administrador";
                    } else if ($usua->nivel_mod == 2) {
                        $nvl = "Usuario";
                    }
                    ?>
                    <tr>
                        <td align="center"><?php echo $usua->id ?></td>
                        <td align="center"><?php echo $usua->user ?></td>
                        <td align="center"><?php echo $nvl ?></td>
                    </tr>
            <?php } ?>
            </table>
        <?php } ?>
            <br><br><a href="<?php echo base_url('/index.php/Principal/')?>">Volver</a>
    </body>
</html>