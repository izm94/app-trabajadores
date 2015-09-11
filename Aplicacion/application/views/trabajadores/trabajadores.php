<!DOCTYPE html>
<html>
    <head>
        <title>Listado de trabajadores</title>
        <meta charset="utf-8">
    </head>
    <body>
        <?php if ($trabajador) { ?>
            <h1 align="center">Listado de Trabajadores Registrados en el Sistema</h1>
            <table border="2" align="center">
                <tr style="font-weight:bolder ">
                    <td width="50" align="center">ID</td>
                    <td width="100" align="center">Nombre</td>
                    <td width="120" align="center">Apellido Paterno</td>
                    <td width="120" align="center">Apellido Materno</td>
                    <td width="70" align="center">Edad</td>
                    <td width="150" align="center">Ocupacion</td>
                    <?php if ($this->session->userdata("nivel") == 1) { ?>
                        <td width="140" align="center" colspan="2">Operaciones</td>
                    <?php } ?>

                </tr>
                <?php foreach ($trabajador->result() as $trabaja) { ?>
                    <tr>
                        <td align="center"><?php echo $trabaja->id ?></td>
                        <td align="center"><?php echo $trabaja->Nombre ?></td>
                        <td align="center"><?php echo $trabaja->Apellido_Paterno ?></td>
                        <td align="center"><?php echo $trabaja->Apellido_Materno ?></td>
                        <td align="center"><?php echo $trabaja->Edad ?></td>
                        <td align="center"><?php echo $trabaja->Ocupación ?></td>
                        <?php if ($this->session->userdata("nivel") == 1) { ?>
                            <td align="center"><a href="<?php echo site_url('/Principal/editar/' . $trabaja->id) ?>">Editar</a></td>
                            <td align="center"><a href="<?php echo site_url('/Principal/borrar/' . $trabaja->id) ?>">Borrar</a></td>
                        <?php } ?>
                    </tr>
                <?php } ?>
            </table>
            <?php
            if ($this->session->userdata("nivel") == 2) {
                echo "<br><br>*Para realizar las operaciones de editar y borrar trabajador, debe iniciar sesion con una cuenta con privilegios de administrador.";
            }
        } else {
            echo "<p>No se cuenta con ningun trabajador en el registro</p>";
        }
        
        ?>
            <br><br><a href="<?php echo site_url('/Principal/')?>">Volver</a>
    </body>
</html>