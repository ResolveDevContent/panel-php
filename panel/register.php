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
                    <strong>Register</strong>
                </header>
                <form method="post">
                    <ul class="login-form d-flex flex-col">
                        <li class='input'>
                            <label for="user">Usuario</label>
                            <input type="text" 
                                name="email" 
                                id="user" 
                            />
                        </li>
                        <li class='input'>
                            <label for="password">Contraseña</label>
                            <div class='d-flex password-container'>
                                <input type="password" 
                                    name="password" 
                                    id="password"
                                />
                            </div>
                        </li>
                    </ul>
                    <div class="d-flex justify-center">
                        <input type="submit" class="btn btn-primary text-center" name="register" value="Registrarse">
                    </div>
                </form>
                <span class="text-center" style="height: 2em; color: red">
                    <?php
                        include_once("config.php");
                        include_once("controllers/registerController.php");
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
</html>