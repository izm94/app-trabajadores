<!DOCTYPE html>
<html>
    <head>
        <title>Iniciar sesión</title>
        <meta charset="utf-8">
        <script type="text/javascript" src="<?php echo base_url('/js/jquery-1.11.3.min.js"') ?>"></script>
        <script languaje="javascript">
            $(document).ready(function () {
                $("#user").focusin(function () {
                    $(this).css("background", "yellow");
                });
                $("#user").focusout(function () {
                    $(this).css("background", "white");
                });
                $("#pw").focusin(function () {
                    $(this).css("background", "yellow");
                });
                $("#pw").focusout(function () {
                    $(this).css("background", "white");
                });

                $("#btnEnviar").on("click", function () {
                    var user = $("#user").val();
                    var pw = $("#pw").val();
                    $("#user").prop('disabled', true);
                    $("#pw").prop('disabled', true);
                    $.ajax({method: "post",
                        url: "<?php echo site_url('/login/opeuser'); ?>",
                        success: function (result) {
                            switch(result){
                                case 'N': alert('Datos incorrectos!');
                                    $("#user").prop('disabled', false);
                                    $("#pw").prop('disabled', false);
                                    $("#user").val('');
                                    $("#user").focus();
                                    $("#pw").val('');
                                    break;
                                case 'S': 
                                    window.location = '<?php echo site_url('/Principal') ?>';break;
                            }
                            //$("#resultado").html('Ingresado');
                        },
                        data: {ope:'login',user: user, pw: pw}
                    });
                });
                
                $("#user").keydown(function (event) {
                    if (event.keyCode === 13) {
                        if ($("#user").val() !== '') {
                            $("#pw").focus();
                        } else {
                        }
                    }
                });
                $("#pw").keydown(function (event) {
                    if (event.keyCode === 13) {
                        if ($("#pw").val() !== '') {
                            $("#btnEnviar").click();
                        }
                    }
                });
            });
        </script>
    </head>
    <body>
        <h1 align="center">Login</h1>
        <p align="center">Ingrese su usuario y contraseña:</p>
        <!--<form action="<?php echo site_url('/Login/signin'); ?>" onkeydown="return event.keyCode !== 13;" method="post">-->
        <table align="center">
            <tr>
                <td>Usuario: </td>
                <td><input type="text" name="user" id="user" required/></td>
            </tr>
            <tr>
                <td>Contraseña: </td>
                <td><input type="password" name="pw" id="pw" required/></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="button" id="btnEnviar" value="Enviar"/></td>
            </tr>
        </table>
        <div id="resultado"></div>
<!--            <div hidden><p align="center"><input type="submit" id="OK" value="Enviar"/></p></div>
<div hidden><p align="center"><input type="reset" id="reseteo" value="Enviar"/></p></div>-->
        <a href="<?php echo site_url('/Login/registro') ?>"><p align="center">Registrar una nueva cuenta!</p></a>
        <!--</form>-->
    </body>
</html>