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

        <main class="wrapper">
            <section id="sobre-nosotros" class="d-flex align-start">
                <aside class="d-flex align-center justify-center">
                    SVG ANIMADO
                </aside>
                <article>
                    <h3>Sobre nosotros</h3>
                    <span>¿Qui&eacute;nes somos?</span>
                    <div>
                        <p>
                            En Red Limit, somos más que una agencia de marketing digital. Somos un equipo apasionado de profesionales dedicados a transformar la manera en que las empresas interactúan con el mundo digital. Desde nuestra fundación, hemos estado creciendo y evolucionando, terciarizando servicios para ofrecer soluciones de marketing de alta calidad a precios competitivos.
                        </p>
                        <br>
                        <div class="d-flex align-center gap-1">
                            <p>Nos encontramos en</p>
                            <i class="argentina"></i>
                            <i class="mexico"></i>
                        </div>
                        <div class="d-flex align-center btn">
                            <a href="/nosotros.php">Conoce m&aacute;s</a>
                            <a href="/unete.php">Trabaj&aacute; con nosotros</a>
                        </div>
                    </div>
                </article>
            </section>
    
            <section id="servicios" class="d-flex flex-col align-center">
                <header>
                    <h3>Servicios</h3>
                </header>
                <ul class="gap-1">
                    <li>
                        <a href="">
                            <img src="" alt="">
                            <em>servicio 1</em>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <img src="" alt="">
                            <em>servicio 2</em>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <img src="" alt="">
                            <em>servicio 3</em>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <img src="" alt="">
                            <em>servicio 4</em>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <img src="" alt="">
                            <em>servicio 5</em>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <img src="" alt="">
                            <em>servicio 6</em>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <img src="" alt="">
                            <em>servicio 7</em>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <img src="" alt="">
                            <em>servicio 8</em>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <img src="" alt="">
                            <em>servicio 9</em>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <img src="" alt="">
                            <em>servicio 10</em>
                        </a>
                    </li>
                </ul>
            </section>
    
            <section id="reviews" class="d-flex flex-col align-center justify-center">
                <header class="d-flex flex-col align-center justify-center">
                    <em>Ellos nos recomiendan (cleintes felices)</em>
                    <span>Nuestros clientes nos califican</span>
                </header>
                <ul class="d-flex align-center gap-1">
                    <li class="d-flex flex-col align-center justify-center">
                        <img src="" alt="">
                        <div class="d-flex align-center">
                            <i class="icon star"></i>
                            <i class="icon star"></i>
                            <i class="icon star"></i>
                            <i class="icon star"></i>
                            <i class="icon star"></i>
                        </div>
                        <span>Excelente</span>
                    </li>
                    <li class="d-flex flex-col align-center justify-center">
                        <img src="" alt="">
                        <div class="d-flex align-center">
                            <i class="icon star"></i>
                            <i class="icon star"></i>
                            <i class="icon star"></i>
                            <i class="icon star"></i>
                        </div>
                        <span>Muy bueno</span>
                    </li>
                    <li class="d-flex flex-col align-center justify-center">
                        <img src="" alt="">
                        <div class="d-flex align-center">
                            <i class="icon star"></i>
                            <i class="icon star"></i>
                            <i class="icon star"></i>
                        </div>
                        <span>Buenos trabajando</span>
                    </li>
                </ul>
            </section>
    
            <section id="cotiza" class="d-flex flex-col align-center justify-center">
                <header class="d-flex flex-col align-center justify-center">
                    <h3>Cotiza</h3>
                    <span>Completa el formulario y cotizaremos tu &eacute;xito</span>
                </header>
                <div class="d-flex">
                    <article>
                        <form data-form>
                            <ul class="ul-form d-flex flex-col gap-1">
                                <li>
                                    <div class="input">
                                        <input type="text" id="nombre"/>
                                        <label for="nombre">Nombre y apellido</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="input">
                                        <input type="text" id="telefono"/>
                                        <label for="telefono">Número de telefono</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="input">
                                        <input type="text" id="empresa"/>
                                        <label for="empresa">Nombre de la empresa</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="input">
                                        <input type="text" id="desEmpresa"/>
                                        <label for="desEmpresa">Descipcion de la empresa</label>
                                    </div>
                                </li>
                                <li>
                                    <label>Seleccioná el motivo de la cotizaci&oacute;n</label>
                                    <ul class="d-flex align-start justify-start flex-wrap gap-5">
                                        <li>
                                            <input type="radio" id="sp" value="Servicios Personalizados" name="motivos-cotizacion">
                                            <label for="sp">
                                                Servicios Personalizados
                                            </label>
                                        </li>
                                        <li>
                                            <input type="radio" id="rs" value="Redes Sociales" name="motivos-cotizacion">
                                            <label for="rs">
                                                Redes Sociales
                                            </label>
                                        </li>
                                        <li>
                                            <input type="radio" id="dw" value="Diseño Web" name="motivos-cotizacion">
                                            <label for="dw">
                                                Diseño Web
                                            </label>
                                        </li>
                                        <li>
                                            <input type="radio" id="b" value="Branding" name="motivos-cotizacion">
                                            <label for="b">
                                                Branding
                                            </label>
                                        </li>
                                        <li>
                                            <input type="radio" id="dg" value="Diseño Grafico" name="motivos-cotizacion">
                                            <label for="dg">
                                                Diseño Gr&aacute;fico
                                            </label>
                                        </li>
                                        <li>
                                            <input type="radio" id="pd" value="Publicidad Digital" name="motivos-cotizacion">
                                            <label for="pd">
                                                Publicidad Digital
                                            </label>
                                        </li>
                                        <li>
                                            <input type="radio" id="otro" value="Otros" name="motivos-cotizacion">
                                            <label for="otro">
                                                Otros
                                            </label>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="btn d-flex justify-center">
                                        <button>Cotiza</button>
                                    </div>
                                </li>
                            </ul>
                        </form>
                    </article>
                    <aside>
                        SVG ANIMADO
                    </aside>
                </div>
            </section>
        </main>

        <?php include_once("includes/footer.php"); ?>
    </body>
</html>