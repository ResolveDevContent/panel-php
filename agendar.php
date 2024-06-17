<!DOCTYPE html>
<html lang="en">

<?php
    $title = "Agendar una reunión";
    include_once "includes/head.php";   
?>

<body>
    <?php include_once("includes/navbar.php"); ?>
    <section id="agendar" class="wrapper">
        <header class="d-flex align-center flex-col text-center gap-5">
            <h2>Agendá una reunión con nosotros</h2>
            <p>
                Para obtener más información sobre nuestros productos y servicios. No dude en enviarnos un correo electrónico. Nuestro personal siempre estará ahí para ayudarle. ¡No lo dudes!
            </p>
            <span>CAMBIAR MENSAJE!(La reunión no queda confirmada)</span>
        </header>
        <article class="d-flex align-start justify-between">
            <form data-form class="d-flex flex-col align-center gap-1 w-100">
                <div class="d-flex align-start justify-between w-100 gap-1">
                    <ul class="ul-form d-flex flex-col gap-1">
                        <li>
                            <div class="input">
                                <input type="text" id="nombre"/>
                                <label for="nombre">Nombre y apellido</label>
                            </div>
                        </li>
                        <li>
                            <div class="input">
                                <label for="pais">Pais</label>
                                <div class="input" data-paises></div>
                            </div>
                        </li>
                        <li>
                            <div class="input">
                                <input type="text" id="telefono"/>
                                <label for="telefono">Numero de teléfono</label>
                            </div>
                        </li>
                        <li>
                            <div class="input">
                                <input type="text" id="nombre-empresa"/>
                                <label for="nombre-empresa">Nombre de la empresa</label>
                            </div>
                        </li>
                        <li>
                            <div class="input">
                                <input type="text" id="desc-empresa"/>
                                <label for="desc-empresa">Descripción de la empresa (rubro y otros)</label>
                            </div>
                        </li>
                    </ul>
                    <ul class="ul-form d-flex flex-col gap-1">
                        <li>
                            <label class="label-cotizacion not-visible">Motivo de cotizaci&oacute;n</label>
                            <div class="input">
                                <select name="cotizacion" id="cotizacion">
                                    <option value="">Selecciona un motivo de la cotización</option>
                                    <option value="Servicios Personalizados">Servicios Personalizados</option>
                                    <option value="Redes Sociales">Redes Sociales</option>
                                    <option value="Diseño web">Diseño Web</option>
                                    <option value="Branding">Branding</option>
                                    <option value="Diseño grafico">Diseño Gráfico</option>
                                    <option value="Publicidad Digital">Publicidad Digital</option>
                                    <option value="Otros">Otros</option>
                                </select>
                            </div>
                        </li>
                        <li class="input-dia">
                            <div class="input">
                                <input type="date" id="date">
                            </div>
                        </li>
                        <li class="item-horarios not-visible">
                            <span>Horarios</span>
                            <ul class="horarios d-flex align-start justify-start flex-wrap gap-5"></ul>
                        </li>
                    </ul>
                </div>
                <footer>
                    <div class="btn d-flex justify-center">
                        <button>Enviar</button>
                    </div>
                </footer>
            </form>
        </article>
    </section>
    <?php include_once("includes/footer.php"); ?>

    <script src="js/index.js"></script>
</body>
</html>