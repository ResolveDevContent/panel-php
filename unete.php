<!DOCTYPE html>
<html lang="en">

<?php
    $title = "Trabajá con nosotros";
    include_once "includes/head.php";   
?>

<body>
    <?php include_once("includes/navbar.php"); ?>
    <section id="unete" class="d-flex align-center flex-col wrapper">
        <header class="d-flex align-center text-center gap-5">
            <div>
                <h2>Trabajá con nosotros</h2>
                <p>Porque trabajar con nosotros, es lo mejor que te puede pasar. Asi que inscribite a nuestros puestos laborales pedazo de wachin.</p>
            </div>
            <img src="" alt="">
        </header>
        <div class="beneficios d-flex flex-col align-center gap-1">
            <strong>Beneficios</strong>
            <ul class="d-flex align-center justify-center gap-1">
                <li>
                    icono
                    <span>Ambiente de trabajo dinámico</span>
                </li>
                <li>
                    icono
                    <span>Oportunidades de crecimiento</span>
                </li>
                <li>
                    icono
                    <span>Proyectos internacionales</span>
                </li>
            </ul>
        </div>
        <article class="d-flex align-center justify-center flex-col">
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
                            <input type="text" id="email"/>
                            <label for="email">Correo electrónico</label>
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
                            <span>Adjuntar CV</span>
                            <input type="file" id="cv"/>
                        </div>
                    </li>
                    <li>
                        <label>Seleccioná tu puesto deseado</label>
                        <ul class="d-flex align-start justify-start flex-wrap gap-5">
                            <li>
                                <input type="radio" id="cm" value="Community Manager" name="puestos-laborales">
                                <label for="cm">
                                    Community Manager
                                </label>
                            </li>
                            <li>
                                <input type="radio" id="ssm" value="Social Media Manager" name="puestos-laborales">
                                <label for="ssm">
                                    Social Media Manager
                                </label>
                            </li>
                            <li>
                                <input type="radio" id="cc" value="Content Creator" name="puestos-laborales">
                                <label for="cc">
                                    Content Creator
                                </label>
                            </li>
                            <li>
                                <input type="radio" id="gd" value="Graphic Designer" name="puestos-laborales">
                                <label for="gd">
                                    Graphic Designer
                                </label>
                            </li>
                            <li>
                                <input type="radio" id="ss" value="SEO Specialist" name="puestos-laborales">
                                <label for="ss">
                                    SEO Specialist
                                </label>
                            </li>
                            <li>
                                <input type="radio" id="dms" value="Digital Marketing Specialist" name="puestos-laborales">
                                <label for="dms">
                                    Digital Marketing Specialist
                                </label>
                            </li>
                            <li>
                                <input type="radio" id="wd" value="Web Developer" name="puestos-laborales">
                                <label for="wd">
                                    Web Developer
                                </label>
                            </li>
                            <li>
                                <input type="radio" id="css" value="Customer Support Specialist" name="puestos-laborales">
                                <label for="css">
                                    Customer Support Specialist
                                </label>
                            </li>
                            <li>
                                <input type="radio" id="otro" value="Otros" name="puestos-laborales">
                                <label for="otro">
                                    Otros
                                </label>
                            </li>
                        </ul>
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