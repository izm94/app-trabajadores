<!DOCTYPE html>
<html>
    <head>
        <title>Editar trabajador</title>
        <meta charset="utf-8">
        <script src="<?php echo base_url('/js/jquery-1.11.3.min.js"') ?>"></script>
        <script>
            $(document).ready(function () {
                $("form").submit(function (event) {
                    if ($("#apellidop").val() === "") {
                        alert("Debe completar el campo de apellido paterno");
                        $("#apellidop").focus();
                        event.preventDefault();
                    } else if ($("#apellidom").val() === "") {
                        alert("Debe completar el campo de apellido materno");
                        $("#apellidom").focus();
                        event.preventDefault();
                    } else if ($("#nombre").val() === "") {
                        alert("Debe completar el campo de nombre");
                        $("#nombre").focus();
                        event.preventDefault();
                    } else if ($("#edad").val() === "") {
                        alert("Debe completar el campo de edad");
                        $("#edad").focus();
                        event.preventDefault();
                    } else if ($("#ocupacion").val() === "") {
                        alert("Debe completar el campo de ocupacion");
                        $("#ocupacion").focus();
                        event.preventDefault();
                    } else {
                        return confirm('Esta seguro de actualizar?');
                    }
                });
                $("#apellidop").focusin(function () {
                    $(this).css("background", "yellow");
                });
                $("#apellidop").focusout(function () {
                    $(this).css("background", "white");
                });
                $("#apellidom").focusin(function () {
                    $(this).css("background", "yellow");
                });
                $("#apellidom").focusout(function () {
                    $(this).css("background", "white");
                });
                $("#nombre").focusin(function () {
                    $(this).css("background", "yellow");
                });
                $("#nombre").focusout(function () {
                    $(this).css("background", "white");
                });
                $("#edad").focusin(function () {
                    $(this).css("background", "yellow");
                });
                $("#edad").focusout(function () {
                    $(this).css("background", "white");
                });
                $("#ocupacion").focusin(function () {
                    $(this).css("background", "yellow");
                });
                $("#ocupacion").focusout(function () {
                    $(this).css("background", "white");
                });
            });
        </script>
    </head>
    <body>
        <?php if ($trabajador) {
            foreach ($trabajador->result() as $trabaja) {
                ?>
                <h1 align="center">Editar trabajador: <?php echo $trabaja->Apellido_Paterno . ' ' . $trabaja->Apellido_Materno . ', ' . $trabaja->Nombre ?></h1>
                <form method="post" action="<?php echo base_url("/index.php/Principal/actualizar/" . $id) ?>">
                    <table align="center">
                        <tr>
                            <td>Apellido Paterno: </td>
                            <td><input type="text" id="apellidop" name="apellidop" value="<?php echo $trabaja->Apellido_Paterno ?>"/></td>
                        </tr>
                        <tr>
                            <td>Apellido Materno: </td>
                            <td><input type="text" id="apellidom" name="apellidom" value="<?php echo $trabaja->Apellido_Materno ?>"/></td>
                        </tr>
                        <tr>
                            <td>Nombre: </td>
                            <td><input type="text" id="nombre" name="nombre" value="<?php echo $trabaja->Nombre; ?>"/></td>
                        </tr>
                        <tr>
                            <td>Edad: </td>
                            <td><input type="text" id="edad" name="edad" value="<?php echo $trabaja->Edad; ?>"/></td>
                        </tr>
                        <tr>
                            <td>Ocupación: </td>
                            <td><input type="text" id="ocupacion" name="ocupacion" value="<?php echo $trabaja->Ocupación ?>"/></td>
                </tr>
            </table>
            <p align="center"><input type="submit" value="Actualizar" /></p>
        </form>
        <?php } }?>
                <br><br><a href="<?php echo site_url('/Principal/')?>">Volver a "Mostrar"</a>
                <br><a href="<?php echo site_url('/Principal/')?>">Volver a "Principal"</a>
    </body>
</html>