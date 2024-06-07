<!DOCTYPE html>
<html lang="en">

    <?php
        session_start();

        include "config.php";

        $title = "Usuario";
        include_once "includes/head.php"; 
        
    ?>

    <body>
        <section class="d-flex">
            <?php include_once("includes/menu.php"); ?>
            <article id="container">
                <div class='pass-form d-flex flex-col flex-wrapalign-center text-white'>
                    <header class='text-center'>
                        <strong>Actualizaci&oacute; de contraseña</strong>
                    </header>
                    <form method="post">
                        <ul class="login-form d-flex flex-col">
                            <li class='input'>
                                <label for="currenPassword">Contraseña actual</label>
                                <input type="password" name="currentPassword" id="currentPassword" requiered/>
                            </li>
                            <li class='input'>
                                <label for="newPassword">Contraseña nueva</label>
                                <div class='d-flex password-container'>
                                    <input type="password" name="newPassword" id="newPassword" required/>
                                </div>
                            </li>
                            <li class='input'>
                                <label for="rNewPassword">Repetir contraseña nueva</label>
                                <div class='d-flex password-container'>
                                    <input type="password" name="rNewPassword" id="rNewPassword" required/>
                                </div>
                            </li>
                        </ul>
                        <div class="d-flex justify-center">
                            <input type="submit" class="btn btn-primary text-center" name="btnChangePassword" value="Actualizar contraseña">
                        </div>
                    </form>
                    <span class="text-center" style="height: 2em; color: red">
                        <?php
                            include_once("config.php");
                            include_once("controllers/changePasswordController.php");
                        ?>
                    </span>
                </div>
            </article>
        </section>
    </body>
</html>