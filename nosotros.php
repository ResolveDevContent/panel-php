<!DOCTYPE html>
<html lang="en">

<?php
    $title = "Sobre nosotros";
    include_once "includes/head.php";   
?>

<body>
    <?php include_once("includes/navbar.php"); ?>
    
    <main class="wrapper d-flex flex-col">
        <section id="sobre-nosotros" class="d-flex align-center nosotros">
            <article>
                <h2>Sobre nosotros</h2>
                <span>¿Qui&eacute;nes somos?</span>
                <div>
                    <span>
                        En <span class="highlight">Red Limit</span>, somos más que una agencia de marketing digital. <span class="highlight">Somos un equipo apasionado</span> de profesionales dedicados a transformar la manera en que las empresas interactúan con el mundo digital. Desde nuestra fundación, hemos estado creciendo y evolucionando, terciarizando servicios para ofrecer soluciones de marketing de alta calidad a precios competitivos.
                        Red Limit no solo ofrece servicios de marketing digital, sino que también <span class="highlight">garantiza resultados efectivos y personalizados</span> para cada cliente. La combinación de nuestro equipo altamente capacitado, el uso de tecnologías avanzadas, y nuestra capacidad para adaptarnos a las necesidades específicas de cada cliente nos hace destacar en el mercado. Este sitio web será la manifestación digital de nuestra filosofía de trabajo, proporcionando una experiencia interactiva y profesional que refleje nuestros valores y objetivos.
                    </span>
                    <br>
                    <div class="d-flex align-center gap-1">
                        <span>Nos encontramos en</span>
                        <div class="d-flex align-center justifi-center gap-1">
                            <i class="argentina"></i>
                            <i class="mexico"></i>
                        </div>
                    </div>
                </div>
            </article>
            <aside class="d-flex align-center justify-center">
                <img src="/gifs/nosotros.gif" alt="">
            </aside>
        </section>

        <section id="valores">
            <ul class="d-flex flex-col w-100">
                <li class="d-flex align-center">
                    <img src="/images/mision.svg" alt="">
                    <div class="d-flex flex-col">
                        <em>Misi&oacute;n</em>
                        <span>
                            Nuestra misi&oacute;n es <span class="highlight">empoderar a las empresas</span> a trav&eacute;s de soluciones de marketing digital personalizadas y accesibles, impulsando su crecimiento y &eacute;xito en el mercado digital. Nos esforzamos por proporcionar un servicio excepcional que combine <span class="highlight">creatividad, tecnolog&iacute;a y estrategias efectivas</span> para maximizar el retorno de inversi&oacute;n de nuestros clientes.
                        </span>
                    </div>
                </li>
                <li class="d-flex align-center right">
                    <img src="/images/vision.svg" alt="">
                    <div class="d-flex flex-col">
                        <em>Visi&oacute;n</em>
                        <span>
                            Nuestra visi&oacute;n es convertirnos en la agencia de marketing digital <span class="highlight">l&iacute;der en Am&eacute;rica Latina</span>, reconocida por nuestra innovaci&oacute;n, eficiencia y capacidad para entregar resultados medibles. Aspiramos a ser el <span class="highlight">socio estrat&eacute;gico</span> de nuestros clientes, ayud&aacute;ndolos a navegar y prosperar en el panorama digital en constante evoluci&oacute;n.
                        </span>
                    </div>
                </li>
                <li class="d-flex align-center">
                    <img src="/images/valores.svg" alt="">
                    <div class="d-flex flex-col">
                        <em>Valores</em>
                        <ul>
                            <li>
                                <span>
                                    <b>Innovaci&oacute;n:</b> Nos mantenemos al d&iacute;a con las &uacute;ltimas tendencias y tecnolog&iacute;as en marketing digital.
                                </span>
                            </li>
                            <li>
                                <span>
                                    <b>Calidad:</b> Ofrecemos servicios de alta calidad que cumplen con los est&aacute;ndares más exigentes.
                                </span>
                            </li>
                            <li>
                                <span>
                                    <b>Resultados:</b> Nos enfocamos en generar resultados medibles que contribuyan al &eacute;xito de nuestros clientes.
                                </span>
                            </li>
                            <li>
                                <span>
                                    <b>Transparencia:</b> Mantenemos una comunicaci&oacute;n abierta y honesta con nuestros clientes e inversionistas.
                                </span>
                            </li>
                            <li>
                                <span>
                                    <b>Pasi&oacute;n:</b> Estamos apasionados por lo que hacemos y comprometidos con el éxito de nuestros clientes.
                                </span>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </section>

        <section id="equipo" class="text-center">
            <h2>Nuestro equipo</h2>
            <span>
                Contamos con un equipo <span class="highlight">diverso y talentoso</span> de especialistas en marketing digital, publicidad, diseño gr&aacute;fico, desarrollo web y gesti&oacute;n de redes sociales. Cada miembro de Red Limit aporta una combinaci&oacute;n &uacute;nica de <span class="highlight">habilidades y experiencia</span>, trabajando juntos para ofrecer soluciones integrales que ayudan a nuestros clientes a alcanzar sus objetivos de negocio.
            </span>
        </section>

        <section id="join" class="text-center d-flex flex-col">
            <em>Trabaja con nosotros</em>
            <span>
                Estamos en constante b&uacute;squeda de nuevos talentos para unirse a nuestro equipo. Si est&aacute;s interesado en formar parte de Red Limit, visita nuestra sección "Trabaja con Nosotros" y env&iacute;anos tu CV junto con una carta de presentaci&oacute;n.
            </span>
            <div class="btn">
                <a href="/unete.php">Trabaja con Nosotros</a>
            </div>
        </section>
    </main>

    <?php include_once("includes/footer.php"); ?>    
</body>
</html>
