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
            include_once "../panel-php/utils/mailer.php"; 
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
                    <p>Porque trabajar con nosotros, es lo mejor que te puede pasar. Asi que inscribite a nuestros puestos laborales pedazo de wachin.</p>
                </div>
                <aside>
                    <img src="/panel-php/gifs/unete.gif" alt="">
                </aside>
            </header>
            <div class="beneficios d-flex flex-col align-center gap-1">
                <strong>Beneficios</strong>
                <ul class="d-flex align-center justify-center gap-1">
                    <li class="d-flex align-center">
                        <i class="icon user-voice"></i>
                        <span>Ambiente de trabajo dinámico</span>
                    </li>
                    <li class="d-flex align-center">
                        <i class="icon rocket"></i>
                        <span>Oportunidades de crecimiento</span>
                    </li>
                    <li class="d-flex align-center">
                        <i class="icon world"></i>
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