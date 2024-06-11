<!DOCTYPE html>
<html lang="en">

    <?php
        session_start();

        include "config.php";
        // require_once "errors.php";

        $title = "Panel";
        include_once "includes/head.php";   
    ?>

    <body>
        <section class="d-flex" id="main">
            <?php include_once("includes/menu.php"); ?>
    
            <article id="container"></article>
        </section>
    </body>
</html>