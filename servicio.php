<!DOCTYPE html>
<html lang="en">

    <?php
        $title = "Panel";
        include_once "includes/head.php";   
    ?>

    <body>
        <?php include_once("includes/navbar.php"); ?>

        <main class="wrapper">
            <section id="servicio" class="d-flex flex-col align-center">
                <aside class="d-flex flex-col text-center">
                    <em>Gesti&oacute;n de Redes Sociales</em>
                    <span>
                        En Red Limit, nos especializamos en la gesti&oacute;n integral de redes sociales. Nuestro enfoque abarca desde la creaci&oacute;n de contenido atractivo y relevante hasta la interacci&oacute;n continua con tu audiencia, todo diseñado para aumentar el compromiso y la lealtad de los seguidores. Utilizamos las &uacute;ltimas herramientas de an&aacute;lisis para monitorear el rendimiento y ajustar nuestras estrategias en tiempo real, garantizando as&iacute; una presencia constante y efectiva en plataformas como Facebook, Instagram, Twitter, Tiktok, LinkedIn y Youtube.</span>
                </aside>
                <article class="d-flex flex-col align-center">
                    <strong>Nuestros trabajos</strong>
                    <div>
                        <img src="images/mockup.png" alt="">
                        <nav class="nav-arrows d-flex align-center justify-between" data-arrows>
                            <a href="#" data-arrow="-1" class="d-flex">
                                <i class="icon arrow-left"></i>
                            </a>
                            <a href="#" data-arrow="1" class="d-flex">
                                <i class="icon arrow-right"></i>
                            </a>
                        </nav>
                        <ul class="d-flex align-center" data-scrollable>
                            <li>
                                <img src="/images/resolvedevverde.png" alt="">
                            </li>
                            <li>
                                <img src="/images/user.png" alt="">
                            </li>
                            <li>
                                <img src="/images/logo-movimiento.svg" alt="">
                            </li>
                        </ul>
                    </div>
                </article>
            </section>
        </main>

        <?php include_once("includes/footer.php"); ?>

        <script src="js/index.js"></script>
    </body>
</html>