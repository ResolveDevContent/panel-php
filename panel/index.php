<!DOCTYPE html>
<html lang="en">

    <?php
        session_start();

        include "config.php";

        $title = "Panel";
        include_once "includes/head.php"; 
        
        // if (!isset($_COOKIE['usuarioLogeado'])) {
        //     header("location:login.php");
        // }
    ?>

    <body>
        <section class="d-flex" id="main">
            <?php include_once("includes/menu.php"); ?>
    
            <article id="container"></article>
        </section>
    </body>
</html>