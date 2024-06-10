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
                                <input type="password" name="newPassword" id="newPassword" required/>
                            </li>
                            <li class='input'>
                                <label for="rNewPassword">Repetir contraseña nueva</label>
                                <input type="password" name="rNewPassword" id="rNewPassword" required/>
                            </li>
                        </ul>
                        <div class="d-flex justify-center">
                            <a href="#" class='visible-btn' id="show-pass">
                                Mostrar contraseñas
                            </a>
                            <input type="submit" class="btn btn-primary text-center" name="btnChangePassword" value="Actualizar contraseña">
                        </div>
                    </form>
                    <span class="text-center" style="height: 2em; color: red">
                        <?php
                            include_once("config.php");
                            include_once("controllers/changePasswordController.php");
                            echo $response
                        ?>
                    </span>
                </div>
            </article>
        </section>
    </body>

    <script>
        const btnShowPassword = document.querySelector("#show-pass");

        btnShowPassword.addEventListener("click", function(evt) {
            evt.preventDefault();

            const inputs = document.querySelectorAll("input[type='password'], input[type='text']");

            inputs.forEach(function(row) {
                console.log(row.type)
                if(row.type == "password") {
                    row.type = "text";
                    btnShowPassword.textContent = "Ocultar contraseñas";
                } else {
                    row.type = "password";
                    btnShowPassword.textContent = "Mostrar contraseñas";
                }    
            })

        })
    </script>
</html>