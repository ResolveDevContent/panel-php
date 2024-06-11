<!DOCTYPE html>
<html lang="en">

<?php
    $title = "Trabajá con nosotros";
    include_once "includes/head.php";   
?>

<body>
    <?php include_once("includes/navbar.php"); ?>
    <section id="unete" class="d-flex align-center flex-col">
        <header class="d-flex align-center flex-col text-center gap-5">
            <div>
                <h2>Trabajá con nosotros</h2>
                <p>Porque trabajar con nosotros, es lo mejor que te puede pasar. Asi que inscribite a nuestros puestos laborales pedazo de wachin.</p>
            </div>
            <div>
                <img src="" alt="">
            </div>
        </header>
        <article class="d-flex align-center justify-center flex-col">
            <div class="d-flex flex-col align-center gap-1">
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
                        <ul class="d-flex align-center justify-start flex-wrap">
                            <li>
                                <input type="radio" id="cm" value="Community Manager" name="puestos-laborales">
                                <label>
                                    Community Manager
                                </label>
                            </li>
                            <li>
                                <input type="radio" id="ssm" value="Social Media Manager" name="puestos-laborales">
                                <label>
                                    Social Media Manager
                                </label>
                            </li>
                            <li>
                                <input type="radio" id="cc" value="Content Creator" name="puestos-laborales">
                                <label>
                                    Content Creator
                                </label>
                            </li>
                            <li>
                                <input type="radio" id="gd" value="Graphic Designer" name="puestos-laborales">
                                <label>
                                    Graphic Designer
                                </label>
                            </li>
                            <li>
                                <input type="radio" id="ss" value="SEO Specialist" name="puestos-laborales">
                                <label>
                                    SEO Specialist
                                </label>
                            </li>
                            <li>
                                <input type="radio" id="dms" value="Digital Marketing Specialist" name="puestos-laborales">
                                <label>
                                    Digital Marketing Specialist
                                </label>
                            </li>
                            <li>
                                <input type="radio" id="wd" value="Web Developer" name="puestos-laborales">
                                <label>
                                    Web Developer
                                </label>
                            </li>
                            <li>
                                <input type="radio" id="css" value="Customer Support Specialist" name="puestos-laborales">
                                <label>
                                    Customer Support Specialist
                                </label>
                            </li>
                            <li>
                                <input type="radio" id="otro" value="Otros" name="puestos-laborales">
                                <label>
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

    <script src="js/index.js"></script>
</body>
</html>