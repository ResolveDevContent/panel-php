<!DOCTYPE html>
<html lang="en">

    <?php
        session_start();

        include "config.php";

        $title = "Usuario";
        include_once "includes/head.php"; 
        
        if (!isset($_SESSION['email'])) {
            header("location:login.php");
        }
    ?>

    <body>
        <section class="d-flex">
            <?php include_once("../includes/menu.php"); ?>
            <article id="container">
                <div class='d-flex flex-col flex-wrapalign-center text-white'>
                    <header class='text-center'>
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
            </article>
        </section>
    </body>
</html>