<!DOCTYPE html>
<html lang="en">

    <?php
        $title = "Panel";
        include_once "includes/head.php";   
    ?>

    <body>
        <?php include_once("includes/navbar.php"); ?>
        
        <section id="inicio">
            <ul>
                <li>
                    <figure>
                        <video src="">
                            <source>
                        </video>
                        <figcaption class="d-flex align-center justify-end">
                            <article class="home-text">
                                <span>subtitulo</span>
                                <div>
                                    <h1>titulo</h1>
                                    <p>
                                        descripcion
                                    </p>
                                </div>
                                <footer>
                                    <a href="#">BTN</a>
                                </footer>
                            </article>
                        </figcaption>
                    </figure>
                </li>
            </ul>
        </section>

        <section id="sobre-nosotros" class="d-flex align-start">
            <aside class="d-flex align-center justify-center">
                svg animado
            </aside>
            <article>
                <h3>Sobre nosotros</h3>
                <span>¿Qui&eacute;nes somos?</span>
                <div>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Illo laborum quam earum soluta quas dolores neque voluptates optio vitae officia similique id saepe, exercitationem, nostrum dolore porro, rem libero culpa.</p>
                    <br>
                    <span>
                        Estamos en
                        <i class="argentina"></i>
                        <i class="mexico"></i>
                    </span>
                </div>
            </article>
        </section>

        <section id="servicios">

        </section>

        <section id="reviews">

        </section>

        <section id="cotizar">

        </section>

        <?php include_once("includes/footer.php"); ?>
    </body>
</html>