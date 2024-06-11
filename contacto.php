<!DOCTYPE html>
<html lang="en">

    <?php
        $title = "Contacto";
        include_once "includes/head.php";   
    ?>

    <body>
        <?php include_once("includes/navbar.php"); ?>
        <section id="contacto" class="d-flex align-center flex-col">
            <header class="d-flex align-center flex-col text-center gap-5">
                <h2>Contáctate con nosotros</h2>
                <p>
                    Para obtener más información sobre nuestros productos y servicios. No dude en enviarnos un correo electrónico. Nuestro personal siempre estará ahí para ayudarle. ¡No lo dudes!
                </p>
            </header>
            <article class="d-flex align-start justify-between">
                <div>
                    <ul>
                        <li class="item d-flex align-start">
                            <div class="d-flex flex-col gap-1">
                                <header class="d-flex align-center gap-5">
                                    <i class="icon mail"></i>
                                    <em>Correo electrónico</em>
                                </header>
                                <ul class="d-flex align-start gap-1 flex-col">
                                    <li class="d-flex align-center gap-5">
                                        <span>contacto@digitalredlimit.com</span>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="item d-flex align-start">
                            <div class="d-flex flex-col gap-1">
                                <header class="d-flex align-center gap-5">
                                    <i class="icon phone"></i>
                                    <em>Teléfono</em>
                                </header>
                                <ul class="d-flex align-start gap-1 flex-col">
                                    <li class="d-flex align-center gap-5">
                                        <i class="argentina"></i>
                                        <span>+54 9 261 609 8855</span>
                                    </li>
                                    <li class="d-flex align-center gap-5">
                                        <i class="mexico"></i>
                                        <span>+52 1 999 608 0167</span>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="item d-flex align-start">
                            <div class="d-flex flex-col gap-1">
                                <header class="d-flex align-center gap-5">
                                    <i class="icon redes"></i>
                                    <em>Redes sociales</em>
                                </header>
                                <ul class="d-flex align-start gap-1 flex-col">
                                    <li class="d-flex align-center gap-5">
                                        <i class="icon instagram"></i>
                                        <span>https://www.instagram.com/digital.redlimit/?locale=sl</span>
                                    </li>
                                    <li class="d-flex align-center gap-5">
                                        <i class="icon facebook"></i>
                                        <span>https://www.facebook.com/people/RED-LIMIT/61552965720510</span>
                                    </li>
                                    <li class="d-flex align-center gap-5">
                                        <i class="icon linkedin"></i>
                                        <span>https://www.linkedin.com/company/red-limit</span>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
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
                                <input type="text" id="email"/>
                                <label for="email">Correo electrónico</label>
                            </div>
                        </li>
                        <li>
                            <div class="input">
                                <input type="text" id="asunto"/>
                                <label for="asunto">Asunto</label>
                            </div>
                        </li>
                        <li>
                            <div class="input">
                                <textarea id="mensaje" cols="4" rows="6"></textarea>
                                <label for="mensaje">Mensaje</label>
                            </div>
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