<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

    <?php
        $title = "Login"; 
        include_once("includes/head.php"); 
    ?>

    <body>
        <div class="background">
            <img src="" alt=""/>
        </div>
        <section class="login d-flex flex-col flex-wrap align-center justify-center">
            <div class='d-flex flex-col flex-wrapalign-center text-white'>
                <header class='text-center'>
                    <h2>¡Bienvenido/a!</h2>
                    <strong>Inicia sesion</strong>
                </header>
                <form method="post">
                    <ul class="login-form d-flex flex-col">
                        <li class='input'>
                            <label for="user">Usuario</label>
                            <input type="text" name="email" id="user" required/>
                        </li>
                        <li class='input'>
                            <label for="password">Contraseña</label>
                            <div class='d-flex password-container'>
                                <input type="password" name="password" id="password" required/>
                                <a href="#" class='visible-btn' id="show-pass">
                                    <i class="icon ver"></i>
                                </a>
                            </div>
                        </li>
                    </ul>
                    <div class="d-flex justify-center">
                        <input type="submit" class="btn btn-primary text-center" name="btnLogin" value="Iniciar sesion">
                    </div>
                </form>
                <span class="text-center" style="height: 2em; color: red">
                    <?php
                        include_once("config.php");
                        include_once("controllers/loginController.php");
                        echo $response;
                    ?>
                </span>
                <footer>
                    <span class='text-white text-center'>Ante cualquier inconveniente, comunic&aacute;te con nosotros</span>
                </footer>
            </div>
            <footer class='d-flex justify-center'>
                <span>© Resolve Dev</span>
            </footer>
        </section>
    </body>

    <script>
        const btnShowPassword = document.querySelector("#show-pass");

        btnShowPassword.addEventListener("click", function(evt) {
            evt.preventDefault();

            const input = document.querySelector("#password");

            if(input.type == "password") {
                input.type = "text";
                btnShowPassword.innerHTML ="<i class='icon no-ver></i>'";
                return;
            }

            input.type = "password";
            btnShowPassword.innerHTML = "<i class='icon ver'></i>";
        })
    </script>
</html>