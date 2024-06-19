<?php
    // Define variables and initialize with empty values
    $nombre = $email = $telefono = $pais = $cv = $puesto = "";
    $nombre_err = $email_err = $telefono_err = $pais_err = $cv_err = $puesto_err = "";
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
        
        $input_telefono = trim($_POST["telefono"]);
        $input_codpais = trim($_POST["cod-pais"]);
        if(empty($input_telefono) && empty($input_codpais)){
            $telefono_err = "Por favor ingrese un teléfono.";     
        } else{
            $telefono = $input_codpais . $input_telefono;
        }

        $input_pais = trim($_POST["pais"]);
        if(empty($input_pais)){
            $pais_err = "Por favor ingrese una dirección de correo electrónico.";     
        } else{
            $pais = $input_pais;
        }

        // Validate imagen
        if($_FILES["cv"]["name"]) {
            $filename = $_FILES["cv"]["name"]; //Obtenemos el nombre original del archivo
            $source = $_FILES["cv"]["tmp_name"]; //Obtenemos un nombre temporal del archivo
            
            $directorio = 'files/'; //Declaramos un  variable con la ruta donde guardaremos los archivos
            
            //Validamos si la ruta de destino existe, en caso de no existir la creamos
            if(!file_exists($directorio)){
                mkdir($directorio, 0777) or die("No se puede crear el directorio de extracci&oacute;n");	
            }
            
            $dir=opendir($directorio); //Abrimos el directorio de destino
            $target_path = $directorio.'/'.$filename; //Indicamos la ruta de destino, así como el nombre del archivo
            
            //Movemos y validamos que el archivo se haya cargado correctamente
            //El primer campo es el origen y el segundo el destino
            if(move_uploaded_file($source, $target_path)) {	
                $cv = $target_path;
            } else {	
                header("location: error.php");
                exit();
            }
            closedir($dir); //Cerramos el directorio de destino
        }

        $input_puesto = trim($_POST["puestos-laborales"]);
        if(empty($input_puesto)){
            $puesto_err = "Por favor eliga un puesto.";     
        } else{
            $puesto = $input_puesto;
        }

        // Check input errors before inserting in database
        if(empty($nombre_err) && empty($email_err) && empty($telefono_err) && empty($cv_err) && empty($puesto_err)) {
            $agendar = false;
            $cotiza = false;
            $unete = true;
            $contacto = false;
            include_once "../utils/mailer.php"; 
            $respuestaMsg = $respuesta;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<?php
    $title = "Trabaj&aacute; con nosotros";
    include_once "includes/head.php";   
?>

<body>
    <?php include_once("includes/navbar.php"); ?>
    <main class="wrapper">
        <section id="unete" class="d-flex align-center flex-col">
            <div class="gradient"></div>
            <header class="d-flex align-center text-center gap-1">
                <div>
                    <h2>Trabajá con nosotros</h2>
                    <span>¡Únete a nuestro equipo! Buscamos personas apasionadas, innovadoras y con ganas de crecer. Ofrecemos un ambiente de trabajo dinámico, oportunidades de desarrollo profesional y un entorno colaborativo. Si quieres formar parte de una empresa en constante evolución y contribuir con tus ideas, ¡te estamos esperando!</span>
                </div>
                <aside>
                    <img src="/gifs/unete.gif" alt="">
                </aside>
            </header>
            <div class="beneficios d-flex flex-col align-center gap-1">
                <strong>Beneficios</strong>
                <ul class="d-flex align-center justify-center gap-1">
                    <li class="d-flex align-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path d="M8 12c2.28 0 4-1.72 4-4s-1.72-4-4-4-4 1.72-4 4 1.72 4 4 4zm0-6c1.178 0 2 .822 2 2s-.822 2-2 2-2-.822-2-2 .822-2 2-2zm1 7H7c-2.757 0-5 2.243-5 5v1h2v-1c0-1.654 1.346-3 3-3h2c1.654 0 3 1.346 3 3v1h2v-1c0-2.757-2.243-5-5-5zm9.364-10.364L16.95 4.05C18.271 5.373 19 7.131 19 9s-.729 3.627-2.05 4.95l1.414 1.414C20.064 13.663 21 11.403 21 9s-.936-4.663-2.636-6.364z"></path>
                            <path d="M15.535 5.464 14.121 6.88C14.688 7.445 15 8.198 15 9s-.312 1.555-.879 2.12l1.414 1.416C16.479 11.592 17 10.337 17 9s-.521-2.592-1.465-3.536z"></path>
                        </svg>
                        <!-- <i class="icon user-voice"></i> -->
                        <span>Ambiente de trabajo dinámico</span>
                    </li>
                    <li class="d-flex align-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path d="M15.78 15.84S18.64 13 19.61 12c3.07-3 1.54-9.18 1.54-9.18S15 1.29 12 4.36C9.66 6.64 8.14 8.22 8.14 8.22S4.3 7.42 2 9.72L14.25 22c2.3-2.33 1.53-6.16 1.53-6.16zm-1.5-9a2 2 0 0 1 2.83 0 2 2 0 1 1-2.83 0zM3 21a7.81 7.81 0 0 0 5-2l-3-3c-2 1-2 5-2 5z"></path>
                        </svg>
                        <!-- <i class="icon rocket"></i> -->
                        <span>Oportunidades de crecimiento</span>
                    </li>
                    <li class="d-flex align-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zM4 12c0-.899.156-1.762.431-2.569L6 11l2 2v2l2 2 1 1v1.931C7.061 19.436 4 16.072 4 12zm14.33 4.873C17.677 16.347 16.687 16 16 16v-1a2 2 0 0 0-2-2h-4v-3a2 2 0 0 0 2-2V7h1a2 2 0 0 0 2-2v-.411C17.928 5.778 20 8.65 20 12a7.947 7.947 0 0 1-1.67 4.873z"></path>
                        </svg>
                        <!-- <i class="icon world"></i> -->
                        <span>Proyectos internacionales</span>
                    </li>
                </ul>
            </div>
            <article class="d-flex align-center justify-center flex-col">
                <form data-form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                    <ul class="ul-form">
                        <li>
                            <div class="input">
                                <input type="text" id="nombre" name="nombre">
                                <label for="nombre">Nombre y apellido</label>
                            </div>
                        </li>
                        <li>
                            <div class="input">
                                <input type="email" id="email" name="email">
                                <label for="email">Correo electrónico</label>
                            </div>
                        </li>
                        <li>
                            <div class="input">
                                <label for="pais">Pais</label>
                                <div class="input" data-paises></div>
                            </div>
                            <div class="input not-visible">
                                <input type="hidden" id="pais" name="pais" required>
                            </div>
                        </li>
                        <li class="d-flex gap-5">
                            <div class="input cod-pais">
                                <input type="text" id="codigo-pais" name="cod-pais" readonly placeholder="Cod. Pais" >
                            </div>
                            <div class="input">
                                <input type="number" id="telefono" name="telefono">
                                <label for="telefono">Número de telefono</label>
                            </div>
                        </li>
                        <li>
                            <div class="input">
                                <span>Adjuntar CV</span>
                                <input type="file" id="cv" name="cv">
                            </div>
                        </li>
                        <li class="puestos">
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
                            <div class="d-flex justify-center align-center">
                                <span class="mensaje-success"><?php echo $respuestaMsg ?></span>
                            </div>
                        </li>
                    </ul>
                </form>
            </article>
        </section>
    </main>

    <?php include_once("includes/footer.php"); ?>

    <script type="module" src="js/index.js"></script>
</body>
</html>