<?php
    // Define variables and initialize with empty values
    $nombre = $telefono = $empresa = $descripcion = $pais = $cotizacion = $dia = $horario = "";
    $nombre_err = $telefono_err = $empresa_err = $descripcion_err = $pais_err = $cotizacion_err = $dia_err = $horario_err = "";
    $respuestaMsg = "";

    // Processing form data when form is submitted
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $input_nombre = trim($_POST["nombre"]);
        if(empty($input_nombre)){
            $nombre_err = "Por favor ingrese el nombre.";
        } else{
            $nombre = $input_nombre;
        }
        
        $input_telefono = trim($_POST["telefono"]);
        $input_codpais = trim($_POST["cod-pais"]);
        if(empty($input_telefono) && empty($input_codpais)){
            $telefono_err = "Por favor ingrese un teléfono.";     
        } else{
            $telefono = $input_codpais . $input_telefono;
        }

        $input_empresa = trim($_POST["empresa"]);
        if(empty($input_empresa)){
            $empresa_err = "Por favor ingrese la empresa.";     
        } else{
            $empresa = $input_empresa;
        }

        $input_descr = trim($_POST["descripcion"]);
        if(empty($input_descr)){
            $descripcion_err = "Por favor ingrese la descripcion de su empresa.";     
        } else{
            $descripcion = $input_descr;
        }

        $input_pais = trim($_POST["pais"]);
        if(empty($input_pais)){
            $pais_err = "Por favor ingrese un pais.";     
        } else{
            $pais = $input_pais;
        }

        $input_cotizacion = trim($_POST["cotizacion"]);
        if(empty($input_cotizacion)){
            $cotizacion_err = "Por favor seleccione una cotización.";     
        } else{
            $cotizacion = $input_cotizacion;
        }

        $input_dia = trim($_POST["dia"]);
        if(empty($input_dia)){
            $dia_err = "Por favor ingrese un dia";     
        } else{
            $dia = $input_dia;
        }

        $input_horario = trim($_POST["horarios"]);
        if(empty($input_horario)){
            $horario_err = "Por favor ingrese un horario";     
        } else{
            $horario = $input_horario;
        }

        // Check input errors before inserting in database
        if(empty($nombre_err) && empty($telefono_err) && empty($empresa_err) && empty($descripcion_err) && empty($pais_err) && empty($cotizacion_err) && empty($dia_err) && empty($horario_err)) {
            $agendar = true;
            $cotiza = false;
            $unete = false;
            $contacto = false;
            include_once "../panel-php/utils/mailer.php"; 
            $respuestaMsg = $respuesta;
        }
    }
?>

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
            <span>CAMBIAR MENSAJE!(La reunión no queda confirmada)</span>
        </header>
        <article class="d-flex align-start justify-between">
            <form data-form class="d-flex flex-col align-center gap-1 w-100" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="d-flex align-start justify-between w-100 gap-1">
                    <ul class="ul-form d-flex flex-col gap-1">
                        <li>
                            <div class="input">
                                <input type="text" id="nombre" name="nombre" required>
                                <label for="nombre">Nombre y apellido</label>
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
                                <input type="text" id="codigo-pais" name="cod-pais" readonly placeholder="Cod. Pais" required>
                            </div>
                            <div class="input">
                                <input type="text" id="telefono" name="telefono" required>
                                <label for="telefono">Numero de teléfono</label>
                            </div>
                        </li>
                        <li>
                            <div class="input">
                                <input type="text" id="nombre-empresa" name="empresa" required>
                                <label for="nombre-empresa">Nombre de la empresa</label>
                            </div>
                        </li>
                        <li>
                            <div class="input">
                                <input type="text" id="desc-empresa" name="descripcion" required>
                                <label for="desc-empresa">Descripción de la empresa (rubro y otros)</label>
                            </div>
                        </li>
                    </ul>
                    <ul class="ul-form d-flex flex-col gap-1">
                        <li>
                            <div class="input">
                                <select name="cotizacion" id="cotizacion" name="cotizacion" required>
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
                                <input type="date" id="date" name="dia" required>
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

    <script type="module" src="js/index.js"></script>
</body>
</html>