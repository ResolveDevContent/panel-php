<!DOCTYPE html>
<html lang="en">

    <?php
        $title = "Protafolio";
        include_once "includes/head.php";   
    ?>

    <body>
        <?php include_once("includes/navbar.php"); ?>

        <section id="banner">
            <div>
                <aside class="d-flex align-center flex-col justify-around">
                    <em class="vertical-text">Redes Sociales</em>
                    <ul class="d-flex aling-center flex-col gap-5">
                        <li>
                            <a href="#" class="d-flex align-center" target="_blank" title="Facebook">
                                <i class="icon facebook"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="d-flex align-center" target="_blank" title="Instagram">
                                <i class="icon instagram"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="d-flex align-center" target="_blank" title="Sitio Web">
                                <i class="icon website"></i>
                            </a>
                        </li>
                    </ul>
                </aside>
                <nav class="nav-arrows d-flex align-center justify-between" data-arrows>
                    <a href="#" data-arrow="-1" class="d-flex">
                        <i class="icon arrow-left"></i>
                    </a>
                    <a href="#" data-arrow="1" class="d-flex">
                        <i class="icon arrow-right"></i>
                    </a>
                </nav>
                <ul data-scrollable class="d-flex align-center">
                    <li>
                        <span class="loader"></span>
                        <img src="/images/user.png" alt="">
                    </li>
                    <li>
                        <span class="loader"></span>
                        <img src="/images/resolvedevverde.png" alt="">
                    </li>
                </ul>
            </div>
        </section>

        <main class="wrapper">
            <section id="proyecto" class="d-flex flex-col align-center gap-1">
                <header class="d-flex flex-col text-center">
                    <h2>XOXO</h2>
                    <span>Gesti&oacute;n de Redes Sociales</span>
                </header>
                <div class="d-flex flex-col">
                    <em>Descripci&oacute;n</em>
                    <span>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Doloribus, deserunt? Iste dolorem, recusandae quos quae dignissimos accusantium magnam facere quaerat excepturi nisi vitae quas rerum sint assumenda, hic voluptatem delectus?</span>
                    <div class="d-flex align-center gap-5">
                        <i class="icon mail"></i>
                        <span>xoxo@email.com</span>
                    </div>
                </div>
            </section>
        </main>

        <?php include_once("includes/footer.php"); ?>

        <script src="js/index.js"></script>
    </body>
</html>