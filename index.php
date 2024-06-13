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
                            En <span style="color: var(--color5);">Red Limit</span>, somos más que una agencia de marketing digital. Somos un equipo apasionado de profesionales dedicados a transformar la manera en que las empresas interactúan con el mundo digital. Desde nuestra fundación, hemos estado creciendo y evolucionando, terciarizando servicios para ofrecer soluciones de marketing de alta calidad a precios competitivos.
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
                                    Gestión de Redes Sociales
                                </a>
                            </li>
                            <li>
                                <a href="#tabb" id="tabb" title="">
                                    Desarrollo de Páginas Web
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
                                    Branding y Diseño Gráfico
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
                                    Aplicaciones Móviles
                                </a>
                            </li>
                            <li>
                                <a href="#tabi" id="tabi" title="">
                                    Creación de Software a Medida
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
                                <h3>Gestión de redes sociales</h3>
                                <p>Hola</p>
                            </section>
                            <section id="tabb" class="tab-content">
                                <h3>Desarrollo de páginas web</h3>
                                <p>Hola</p>
                            </section>
                            <section id="tabc" class="tab-content">
                                <h3>Publicidad Digital</h3>
                                <p>Hola</p>
                            </section>
                            <section id="tabd" class="tab-content">
                                <h3>SEO y SEM</h3>
                                <p>Hola</p>
                            </section>
                            <section id="tabe" class="tab-content">
                                <h3>Branding y Diseño Gráfico</h3>
                                <p>Hola</p>
                            </section>
                            <section id="tabf" class="tab-content">
                                <h3>email Marketing</h3>
                                <p>Hola</p>
                            </section>
                            <section id="tabg" class="tab-content">
                                <h3>Vidfeo marginketing</h3>
                                <p>Hola</p>
                            </section>
                            <section id="tabh" class="tab-content">
                                <h3>aplicaciones moviles</h3>
                                <p>Hola</p>
                            </section>
                            <section id="tabi" class="tab-content">
                                <h3>creacion de fsfotware a medida</h3>
                                <p>Hola</p>
                            </section>
                            <section id="tabj" class="tab-content">
                                <h3>logos en movimiento</h3>
                                <p>Hola</p>
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
        <script src="js/index.js"></script>
    </body>
</html>