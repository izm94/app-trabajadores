<!DOCTYPE html>
<html>
    <head>
        <title>Ingresar nuevo trabajador</title>
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
                        return confirm('Esta seguro de continuar?');
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
        <h1 align="center">Agregar trabajador</h1>
        <form action="<?php echo base_url('/index.php/Principal/recibirdatos/') ?>" method="post">
            <table align="center">
                <tr>
                    <td>Apellido Paterno: </td>
                    <td><input type="text" name="apellidop" id="apellidop"/></td>
                </tr>
                <tr>
                    <td>Apellido Materno: </td>
                    <td><input type="text" name="apellidom" id="apellidom"/></td>
                </tr>
                <tr>
                    <td>Nombre: </td>
                    <td><input type="text" name="nombre" id="nombre"/></td>
                </tr>
                <tr>
                    <td>Edad: </td>
                    <td><input type="text" name="edad" id="edad"/></td>
                </tr>
                <tr>
                    <td>Ocupacion: </td>
                    <td><input type="text" name="ocupacion" id="ocupacion"/></td>
                </tr>
            </table>
            <p align="center"><input type="submit" name="OK" value="Enviar"/></p>
        </form>
        <br><br><a href="<?php echo site_url('/Principal/')?>">Volver</a>
    </body>
</html>