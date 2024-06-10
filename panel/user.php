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
                <div class='pass-form d-flex flex-col flex-wrap '>
                    <a href="productos.php">
                        <i class="icon left-arrow"></i>
                        <span>Volver</span>
                    </a>
                    <header class='text-center'>
                        <strong>Actualizaci&oacute; de contraseña</strong>
                    </header>
                    <form method="post">
                        <ul class="d-flex flex-col">
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
                            <li>
                                <a href="#" class='btn btn-default visible-btn' id="show-pass">
                                    Mostrar contraseñas
                                </a>
                            </li>
                        </ul>
                        <span class="text-center" style="height: 2em; color: red">
                            <?php
                                include_once("config.php");
                                include_once("controllers/changePasswordController.php");
                                echo $response
                            ?>
                        </span>
                        <footer class="d-flex justify-end align-center">
                            <input type="submit" class="btn btn-success text-center" name="btnChangePassword" value="Actualizar contraseña">
                        </footer>
                    </form>
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