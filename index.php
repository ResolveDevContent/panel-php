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
                    <h4>Sobre nosotros</h4>
                    <span>¿Qui&eacute;nes somos?</span>
                    <div>
                        <span>
                            En <span class="highlight">Red Limit</span>, somos m&aacute;s que una agencia de marketing digital. Somos un equipo apasionado de profesionales dedicados a transformar la manera en que las empresas interact&uacute;an con el mundo digital. Desde nuestra fundaci&oacute;n, hemos estado creciendo y evolucionando, terciarizando servicios para ofrecer soluciones de marketing de alta calidad a precios competitivos.
                        </span>
                        <br>
                        <div class="d-flex align-center gap-1">
                            <p>Nos encontramos en</p>
                            <i class="argentina"></i>
                            <i class="mexico"></i>
                        </div>
                        <div class="d-flex align-center btn gap-1">
                            <a href="/nosotros.php">Conoce m&aacute;s</a>
                            <a href="/unete.php">Trabaj&aacute; con nosotros</a>
                        </div>
                    </div>
                </article>
            </section>
    
            <section id="servicios" class="d-flex flex-col align-center">
                <header>
                    <h4>Servicios</h4>
                </header>
                <article class="d-flex w-100">
                    <div class="tabs-container">
                        <ul class="tabs">
                            <li>
                                <a href="#taba" id="taba" title="">
                                    Gesti&oacute;n de Redes Sociales
                                </a>
                            </li>
                            <li>
                                <a href="#tabb" id="tabb" title="">
                                    Desarrollo de P&aacute;ginas Web
                                </a>
                            </li>
                            <li>
                                <a href="#tabc" id="tabc" title="">
                                    Publicidad Digital
                                </a>
                            </li>
                            <li>
                                <a href="#tabd" id="tabd" title="">
                                    SEO y SEM
                                </a>
                            </li>
                            <li>
                                <a href="#tabe" id="tabe" title="">
                                    Branding y Diseño Gr&aacute;fico
                                </a>
                            </li>
                            <li>
                                <a href="#tabf" id="tabf" title="">
                                    Email Marketing
                                </a>
                            </li>
                            <li>
                                <a href="#tabg" id="tabg" title="">
                                    Video Marketing
                                </a>
                            </li>
                            <li>
                                <a href="#tabh" id="tabh" title="">
                                    Aplicaciones M&oacute;viles
                                </a>
                            </li>
                            <li>
                                <a href="#tabi" id="tabi" title="">
                                    Creaci&oacute;n de Software a Medida
                                </a>
                            </li>
                            <li>
                                <a href="#tabj" id="tabj" title="">
                                    Logos en Movimiento
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content-wrapper">
                            <section id="taba" class="tab-content">
                                <em>Gesti&oacute;n de redes sociales</em>
                                <p>Gesti&oacute;n integral, creaci&oacute;n de contenido, interacci&oacute;n continua, uso de herramientas de an&aacute;lisis.</p>
                                <img src="/images/redes-sociales.svg" alt="">
                                <div class="btn">
                                    <a href="">Ver m&aacute;s</a>
                                </div>
                            </section>
                            <section id="tabb" class="tab-content">
                                <em>Desarrollo de p&aacute;ginas web</em>
                                <p> Soluciones adaptadas, tecnolog&iacute;as avanzadas, diseño responsivo, optimizaci&oacute;n SEO.</p>
                                <img src="/images/paginas-web.svg" alt="">
                                <div class="btn">
                                    <a href="">Ver m&aacute;s</a>
                                </div>
                            </section>
                            <section id="tabc" class="tab-content">
                                <em>Publicidad Digital</em>
                                <p>Diseño y ejecuci&oacute;n de campañas, uso de Google Ads, Facebook Ads e Instagram Ads.</p>
                                <img src="/images/publicidad.svg" alt="">
                                <div class="btn">
                                    <a href="">Ver m&aacute;s</a>
                                </div>
                            </section>
                            <section id="tabd" class="tab-content">
                                <em>SEO y SEM</em>
                                <p>T&eacute;cnicas avanzadas de optimizaci&oacute;n, campañas de marketing en buscadores.</p>
                                <img src="/images/seo.svg" alt="">
                                <div class="btn">
                                    <a href="">Ver m&aacute;s</a>
                                </div>
                            </section>
                            <section id="tabe" class="tab-content">
                                <em>Branding y Diseño Gr&aacute;fico</em>
                                <p>Identidades visuales, diseño de logotipos, materiales de marketing.</p>
                                <img src="/images/diseño.svg" alt="">
                                <div class="btn">
                                    <a href="">Ver m&aacute;s</a>
                                </div>
                            </section>
                            <section id="tabf" class="tab-content">
                                <em>Email Marketing</em>
                                <p>Campañas personalizadas, segmentaci&oacute;n, personalizaci&oacute;n.</p>
                                <img src="/images/mail.svg" alt="">
                                <div class="btn">
                                    <a href="">Ver m&aacute;s</a>
                                </div>
                            </section>
                            <section id="tabg" class="tab-content">
                                <em>Video marketing</em>
                                <p>Creaci&oacute;n de videos impactantes, videos promocionales, tutoriales.</p>
                                <img src="/images/marketing.svg" alt="">
                                <div class="btn">
                                    <a href="">Ver m&aacute;s</a>
                                </div>
                            </section>
                            <section id="tabh" class="tab-content">
                                <em>Aplicaciones M&oacute;viles</em>
                                <p>Desarrollo de aplicaciones intuitivas para iOS y Android.</p>
                                <img src="/images/mobile.svg" alt="">
                                <div class="btn">
                                    <a href="">Ver m&aacute;s</a>
                                </div>
                            </section>
                            <section id="tabi" class="tab-content">
                                <em>Creaci&oacute;n de Software a Medida</em>
                                <p>Soluciones personalizadas, sistemas de gesti&oacute;n, aplicaciones espec&iacute;ficas.</p>
                                <img src="/images/software.svg" alt="">
                                <div class="btn">
                                    <a href="">Ver m&aacute;s</a>
                                </div>
                            </section>
                            <section id="tabj" class="tab-content">
                                <em>Logos en Movimiento</em>
                                <p>Animaciones de logotipos, uso en sitios web, redes sociales, videos promocionales.</p>
                                <img src="/images/logo-movimiento.svg" alt="">
                                <div class="btn">
                                    <a href="">Ver m&aacute;s</a>
                                </div>
                            </section>
                        </div>
                    </div>
                </article>
            </section>
    
            <section id="reviews" class="d-flex flex-col align-center justify-center">
                <header class="d-flex flex-col align-center justify-center">
                    <h4>Ellos nos recomiendan</h4>
                    <span>Nuestros clientes satisfechos nos califican</span>
                </header>
                <ul class="d-flex align-center justify-center gap-1">
                    <li class="d-flex flex-col justify-center">
                        <article class="d-flex align-center customer">
                            <img src="/images/user.png" alt="">
                            <div class="d-flex flex-col">
                                <em>Jose Luis Mbappe</em>
                                <span>Verdulero</span>
                                <div class="d-flex align-center">
                                    <i class="icon star"></i>
                                    <i class="icon star"></i>
                                    <i class="icon star"></i>
                                    <i class="icon star"></i>
                                    <i class="icon star"></i>
                                </div>
                            </div>
                        </article>
                        <aside>
                            <span>Excelente servicio que me han brindado</span>
                        </aside>
                    </li>
                    <li class="d-flex flex-col justify-center">
                        <article class="d-flex align-center customer">
                            <img src="/images/user.png" alt="">
                            <div class="d-flex flex-col">
                                <em>Pablo Javier Dembele</em>
                                <span>Kinesiologo</span>
                                <div class="d-flex align-center">
                                    <i class="icon star"></i>
                                    <i class="icon star"></i>
                                    <i class="icon star"></i>
                                    <i class="icon star"></i>
                                </div>
                            </div>
                        </article>
                        <aside>
                            <span>muy buenos servicio que me han brindado</span>
                        </aside>
                    </li>
                    <li class="d-flex flex-col justify-center">
                        <article class="d-flex align-center customer">
                            <img src="/images/user.png" alt="">
                            <div class="d-flex flex-col">
                                <em>Carlos Alberto Viatri</em>
                                <span>Cocinero</span>
                                <div class="d-flex align-center">
                                    <i class="icon star"></i>
                                    <i class="icon star"></i>
                                    <i class="icon star"></i>
                                </div>
                            </div>
                        </article>
                        <aside>
                            <span>Buenos servicio</span>
                        </aside>
                    </li>
                </ul>
            </section>
    
            <section id="cotiza" class="d-flex flex-col align-center justify-center">
                <header class="d-flex flex-col align-center justify-center">
                    <h4>Cotiza</h4>
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
                                        <label for="desEmpresa">Descipcion de la empresa (rubro y otros)</label>
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
        <script src="js/index.js"></script>
    </body>
</html>