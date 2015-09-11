<!DOCTYPE html>
<html>
    <head>
        <title>Página Principal</title>
        <meta charset="utf-8">
        <script src="<?php echo base_url('/js/jquery-1.11.3.min.js"') ?>"></script>
    </head>
    <body>
        <h1 align="center">Página Principal</h1>
        <p align="right">Usuario activo: <?php echo $this->session->userdata("usuario") ?></p>
        <p align="right">Privilegios: <?php
            if ($this->session->userdata("nivel") == 1) {
                echo "Administrador";
            } else if ($this->session->userdata("nivel") == 2) {
                echo "Usuario";
            }
            ?></p>
        <a href="<?php echo site_url('/Login/signout') ?>"><p align="right">Cerrar sesión</p></a>
        <table align="center" border="1" style="">
            <tr>
                <td align="center" colspan="2"><h2>Administrar trabajadores</h2></td>
                <td align="center" colspan="2"><h2>Administrar usuarios</h2></td>
            </tr>
            <tr>
                <?php if ($this->session->userdata("nivel") == 1) { ?>
                    <td align="center"><a href="<?php echo site_url('/Principal/mostrar/') ?>">Listar trabajadores</a></td>
                    <td align="center"><a href="<?php echo site_url('/Principal/nuevo/') ?>">Agregar trabajador</a></td>
                <?php } else { ?>
                    <td colspan="2" align="center"><a href="<?php echo site_url('/Principal/mostrar/') ?>">Listar trabajadores</a></td>
                <?php } ?>
                <?php if ($this->session->userdata("nivel") == 1) { ?>
                    <td align="center"><a href="<?php echo site_url('/Principal/registrousuario/') ?>">Registrar nuevo usuario</a></td>
                    <td align="center"><a href="<?php echo site_url('/Principal/listarusuario/') ?>">Listar usuarios</a></td>
                <?php } else { ?>
                    <td colspan="2" align="center"><a href="<?php echo site_url('/Principal/registrousuario/') ?>">Registrar nuevo usuario</a></td>
                <?php } ?>
            </tr>
        </table>
    </body>
</html>
