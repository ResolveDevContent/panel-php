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
    </header>
        <article class="d-flex align-start justify-between">
            <form data-form>
                <ul class="ul-form">
                    <li>
                        <div class="input">
                            <input type="text" id="nombre"/>
                            <label for="nombre">Nombre y apellido</label>
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
                    <li>
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
                    <li>
                        <div class="input">
                            <input type="text" id="pais"/>
                            <label for="pais">Pais o Estado</label>
                        </div>
                    </li>
                    <li>
                        <div class="input">
                            <input type="date" id="date">
                        </div>
                    </li>
                    <li>
                        <ul class="horarios"></ul>
                    </li>
                    <li>
                        <div class="btn d-flex justify-center">
                            <button>Enviar</button>
                        </div>
                    </li>
                </ul>
            </form>
        </article>
    </section>
    <?php include_once("includes/footer.php"); ?>

    <script src="js/index.js"></script>
</body>
</html>