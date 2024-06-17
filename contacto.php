<?php
    // Define variables and initialize with empty values
    $nombre = $email = $asunto = $mensaje = "";
    $nombre_err = $email_err = $asunto_err = $mensaje_err = "";
    $respuestaMsg = "";

    // Processing form data when form is submitted
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $input_nombre = trim($_POST["nombre"]);
        if(empty($input_nombre)){
            $nombre_err = "Por favor ingrese el nombre.";
        } else{
            $nombre = $input_nombre;
        }
        
        $input_email = trim($_POST["email"]);
        if(empty($input_email)){
            $email_err = "Por favor ingrese una dirección de correo electrónico.";     
        } else{
            $email = $input_email;
        }
        
        $input_asunto = trim($_POST["asunto"]);
        if(empty($input_asunto)){
            $asunto_err = "Por favor ingrese un asunto.";     
        } else{
            $asunto = $input_asunto;
        }

        $input_mensaje = trim($_POST["mensaje"]);
        if(empty($input_mensaje)){
            $mensaje_err = "Por favor ingrese un mensaje.";     
        } else{
            $mensaje = $input_mensaje;
        }

        // Check input errors before inserting in database
        if(empty($nombre_err) && empty($email_err) && empty($asunto_err) && empty($mensaje_err)) {
            include_once "../panel-php/utils/mailer.php"; 
            $respuestaMsg = $respuesta;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

    <?php
        $title = "Contacto";
        include_once "includes/head.php";   
    ?>

    <body>
        <?php include_once("includes/navbar.php"); ?>
        <section id="contacto" class="d-flex align-center flex-col wrapper">
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
                                <ul class="d-flex align-start justify-center gap-1">
                                    <li class="d-flex align-center gap-5">
                                        <a href="https://www.instagram.com/digital.redlimit/?locale=sl" target="_blank">
                                            <i class="icon instagram"></i>
                                        </a>
                                    </li>
                                    <li class="d-flex align-center gap-5">
                                        <a href="https://www.facebook.com/people/RED-LIMIT/61552965720510" target="_blank">
                                            <i class="icon facebook"></i>
                                        </a>
                                    </li>
                                    <li class="d-flex align-center gap-5">
                                        <a href="https://www.linkedin.com/company/red-limit" target="_blank">
                                            <i class="icon linkedin"></i>
                                        </a>    
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
                <form data-form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <ul class="ul-form">
                        <li>
                            <div class="input">
                                <input type="text" id="nombre" name="nombre" value="<?php echo $nombre; ?>"/>
                                <label for="nombre">Nombre y apellido</label>
                            </div>
                        </li>
                        <li>
                            <div class="input">
                                <input type="text" id="email" name="email" value="<?php echo $email; ?>"/>
                                <label for="email">Correo electrónico</label>
                            </div>
                        </li>
                        <li>
                            <div class="input">
                                <input type="text" id="asunto" name="asunto" value="<?php echo $asunto; ?>"/>
                                <label for="asunto">Asunto</label>
                            </div>
                        </li>
                        <li>
                            <div class="input">
                                <textarea placeholder="Mensaje..." id="mensaje" cols="4" rows="6" name="mensaje" value="<?php echo $mensaje; ?>"></textarea>
                            </div>
                        </li>
                        <li>
                            <div class="btn d-flex justify-center">
                                <button>Enviar</button>
                                <?php echo $respuestaMsg ?>
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