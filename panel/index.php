<!DOCTYPE html>
<html lang="en">

    <?php
        session_start();

        include "config.php";

        $title = "Panel";
        include_once "includes/head.php"; 
        
        // if (!isset($_SESSION['email'])) {
        //     header("location:login.php");
        // }
    ?>

    <body>
        <section class="d-flex">
            <?php include_once("includes/menu.php"); ?>
    
            <article id="container"></article>
        </section>
    </body>
</html>