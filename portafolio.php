<!DOCTYPE html>
<html lang="en">

    <?php
        $title = "Protafolio";
        include_once "includes/head.php";   
    ?>

    <body>
        <?php include_once("includes/navbar.php"); ?>

        <main class="wrapper">
            <section id="portafolio" class="d-flex flex-col align-center gap-1">
                <header class="d-flex flex-col align-center">
                    <h2>Protafolio</h2>
                    <p>Aqu&iacute; podra encontrar todos nuestros trabajos</p>
                </header>
                <div class="destacados d-flex flex-col align-center">
                    <em>Proyectos destacados</em>
                    <p>proyectos destacados aqui</p>
                    <ul>
                        <li></li>
                    </ul>
                </div>
                <div class="listado">
                    <ul class="gap-1">
                        <li>
                            <img src="/images/user.png" alt="">
                            <p>Gesti&oacute;n de redes sociales</p>
                        </li>
                        <li>
                            <img src="/images/user.png" alt="">
                            <p>Gesti&oacute;n de redes sociales</p>
                        </li>
                        <li>
                            <img src="/images/user.png" alt="">
                            <p>Gesti&oacute;n de redes sociales</p>
                        </li>
                        <li>
                            <img src="/images/user.png" alt="">
                            <p>Gesti&oacute;n de redes sociales</p>
                        </li>
                    </ul>
                </div>
            </section>
        </main>

        <?php include_once("includes/footer.php"); ?>
    </body>
</html>