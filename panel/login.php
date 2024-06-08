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
                                    <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24'><path d='M12 9a3.02 3.02 0 0 0-3 3c0 1.642 1.358 3 3 3 1.641 0 3-1.358 3-3 0-1.641-1.359-3-3-3z'></path><path d='M12 5c-7.633 0-9.927 6.617-9.948 6.684L1.946 12l.105.316C2.073 12.383 4.367 19 12 19s9.927-6.617 9.948-6.684l.106-.316-.105-.316C21.927 11.617 19.633 5 12 5zm0 12c-5.351 0-7.424-3.846-7.926-5C4.578 10.842 6.652 7 12 7c5.351 0 7.424 3.846 7.926 5-.504 1.158-2.578 5-7.926 5z'></path></svg>
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
        const btnShowPassword = document.querySelector("#show-pass")

        btnShowPassword.addEventListener("click", function(evt) {
            evt.preventDefault()

            const input = document.querySelector("#password");

            if(input.type == "password") {
                input.type = "text"
                btnShowPassword.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24""><path d="M12 4.998c-1.836 0-3.356.389-4.617.971L3.707 2.293 2.293 3.707l3.315 3.316c-2.613 1.952-3.543 4.618-3.557 4.66l-.105.316.105.316C2.073 12.382 4.367 19 12 19c1.835 0 3.354-.389 4.615-.971l3.678 3.678 1.414-1.414-3.317-3.317c2.614-1.952 3.545-4.618 3.559-4.66l.105-.316-.105-.316c-.022-.068-2.316-6.686-9.949-6.686zM4.074 12c.103-.236.274-.586.521-.989l5.867 5.867C6.249 16.23 4.523 13.035 4.074 12zm9.247 4.907-7.48-7.481a8.138 8.138 0 0 1 1.188-.982l8.055 8.054a8.835 8.835 0 0 1-1.763.409zm3.648-1.352-1.541-1.541c.354-.596.572-1.28.572-2.015 0-.474-.099-.924-.255-1.349A.983.983 0 0 1 15 11a1 1 0 0 1-1-1c0-.439.288-.802.682-.936A3.97 3.97 0 0 0 12 7.999c-.735 0-1.419.218-2.015.572l-1.07-1.07A9.292 9.292 0 0 1 12 6.998c5.351 0 7.425 3.847 7.926 5a8.573 8.573 0 0 1-2.957 3.557z"></path></svg>'
                return;
            }

            input.type = "password" 
            btnShowPassword.innerHTML = "<svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24''><path d='M12 9a3.02 3.02 0 0 0-3 3c0 1.642 1.358 3 3 3 1.641 0 3-1.358 3-3 0-1.641-1.359-3-3-3z'></path><path d='M12 5c-7.633 0-9.927 6.617-9.948 6.684L1.946 12l.105.316C2.073 12.383 4.367 19 12 19s9.927-6.617 9.948-6.684l.106-.316-.105-.316C21.927 11.617 19.633 5 12 5zm0 12c-5.351 0-7.424-3.846-7.926-5C4.578 10.842 6.652 7 12 7c5.351 0 7.424 3.846 7.926 5-.504 1.158-2.578 5-7.926 5z'></path></svg>"
        })
    </script>
</html>