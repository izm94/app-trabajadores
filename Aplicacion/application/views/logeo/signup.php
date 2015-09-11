<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Página de registro de cuentas</title>
        <script src="<?php echo base_url('/js/jquery-1.11.3.min.js"') ?>"></script>
        <script>
            $(document).ready(function () {
                $("form").submit(function (event) {
                    if ($("#usern").val() === "") {
                        alert("Debe completar el campo de usuario");
                        $("#usern").focus();
                        event.preventDefault();
                    } else if ($("#pwn").val() === "") {
                        alert("Debe completar el campo de contrasena");
                        $("#pwn").focus();
                        event.preventDefault();
                    } else {
                        return confirm('Esta seguro de desea crear una nueva cuenta?');
                    }
                });
                $("#usern").focusin(function () {
                    $(this).css("background", "yellow");
                });
                $("#usern").focusout(function () {
                    $(this).css("background", "white");
                });
                $("#pwn").focusin(function () {
                    $(this).css("background", "yellow");
                });
                $("#pwn").focusout(function () {
                    $(this).css("background", "white");
                });
            });
        </script>
    </head>
    <body>
        <?php if ($this->session->userdata("nivel") == 1) { ?>
            <p align="right">Usuario activo: <?php echo $this->session->userdata("usuario") ?></p>
        <?php } ?>
        <h1 align="center">Registrar Nueva Cuenta!</h1>
        <form action="<?php echo site_url('/login/signup/') ?>" method="post">
            <table align="center">
                <tr>
                    <td>Nombre de usuario: </td>
                    <td><input type="text" name="usern" id="usern"/></td>
                </tr>
                <tr>
                    <td>Contraseña: </td>
                    <td><input type="password" name="pwn" id="pwn"/></td>
                </tr>
                <?php if ($this->session->userdata("nivel") == 1) { ?>
                    <tr>
                        <td>Nivel: </td>
                        <td><select name="nivel"><option>ADMINISTRADOR</option><option>USUARIO</option></select></td>
                    </tr>
                <?php } ?>
            </table>
            <p align="center"><input type="submit" name="OK" value="<?php
                if ($this->session->userdata("nivel") == 1) {
                    echo "Registrar usuario";
                } else {
                    echo "Registrarse";
                }
                ?>"/></p>
            <a href="<?php echo site_url('/Login') ?>">Volver</a>
        </form>
    </body>
</html>