<?php
    // Define variables and initialize with empty values
    $nombre = $telefono = $empresa = $descripcion = $pais = $cotizacion = "";
    $nombre_err = $telefono_err = $empresa_err = $descripcion_err = $pais_err = $cotizacion_err = "";
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

        // Check input errors before inserting in database
        if(empty($nombre_err) && empty($telefono_err) && empty($empresa_err) && empty($descripcion_err) && empty($pais_err) && empty($cotizacion_err)) {
            $agendar = false;
            $cotiza = true;
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
        $title = "Panel";
        include_once "includes/head.php";
        require_once "config.php";

        $servicios = '';
        $query = "SELECT * FROM servicios";
        if($result = mysqli_query($sql, $query)){
            if(mysqli_num_rows($result) > 0){
                $introduccion = '';
                $servicios = '<div class="tabs-container">';
                    $servicios .= '<ul class="tabs">';
                    while($row = mysqli_fetch_array($result)) {
                        $servicios .= '<li>';
                            $servicios .= "<a href='#". $row['nombre'] ."' id='". $row['nombre'] ."'>". $row['nombre'] ."</a>";
                        $servicios .= '</li>';
                        
                        $introduccion .= "<section id='". $row['nombre'] ."' class='tab-content'>";
                            $introduccion .= '<em>' .$row['nombre'] .'</em>';
                            $introduccion .= '<p>' .$row['introduccion'] .'</p>';
                            $introduccion .= '<img src="' .$row['imagen'] .'" alt="">';
                            $introduccion .= '<div class="btn">';
                                $introduccion .= "<a href='/servicio.php?servicioId=". $row['servicioId'] ."'>Ver m&aacute;s</a>";
                            $introduccion .= '</div>';
                        $introduccion .= '</section>';
                    }
                    $servicios .= '</ul>';
                    $servicios .= '<div class="tab-content-wrapper">';
                    $servicios .= $introduccion;
                    $servicios .= '</div>';
                $servicios .= '</div>';
            }
        }
    ?>

    <body>
        <?php include_once("includes/navbar.php"); ?>

        <section id="inicio">
            <ul>
                <li>
                    <figure>
                        <video src="">
                            <source>
                        </video>
                        <figcaption class="d-flex align-center justify-end">
                            <article class="home-text">
                                <span>subtitulo</span>
                                <div>
                                    <h1>titulo</h1>
                                    <p>
                                        descripcion
                                    </p>
                                </div>
                                <footer>
                                    <a href="#">BTN</a>
                                </footer>
                            </article>
                        </figcaption>
                    </figure>
                </li>
            </ul>
        </section>

        <main class="wrapper">
            <section id="sobre-nosotros" class="d-flex align-start">
                <aside class="d-flex align-center justify-center">
                    SVG ANIMADO
                </aside>
                <article>
                    <h4>Sobre nosotros</h4>
                    <span>¿Qui&eacute;nes somos?</span>
                    <div>
                        <span>
                            En <span class="highlight">Red Limit</span>, somos m&aacute;s que una agencia de marketing digital. Somos un equipo apasionado de profesionales dedicados a transformar la manera en que las empresas interact&uacute;an con el mundo digital. Desde nuestra fundaci&oacute;n, hemos estado creciendo y evolucionando, terciarizando servicios para ofrecer soluciones de marketing de alta calidad a precios competitivos.
                        </span>
                        <br>
                        <div class="d-flex align-center gap-1">
                            <p>Nos encontramos en</p>
                            <div class="d-flex align-center justifi-center gap-1">
                                <i class="argentina"></i>
                                <i class="mexico"></i>
                            </div>
                        </div>
                        <div class="d-flex align-center btn gap-1">
                            <a href="/nosotros.php">Conoce m&aacute;s</a>
                            <a href="/unete.php">Trabaj&aacute; con nosotros</a>
                        </div>
                    </div>
                </article>
            </section>
    
            <?php if($servicios) : ?>
                <section id="servicios" class="d-flex flex-col align-center">
                    <header>
                        <h4>Servicios</h4>
                    </header>
                    <article class="d-flex w-100">
                        <?php
                            echo $servicios;
                        ?>
                    </article>
                </section>
            <?php endif ?>
    
            <section id="reviews" class="d-flex flex-col align-center justify-center">
                <header class="d-flex flex-col align-center justify-center">
                    <h4>Ellos nos recomiendan</h4>
                    <span>Nuestros clientes satisfechos nos califican</span>
                </header>
                <ul class="d-flex align-center justify-center gap-1">
                    <li class="d-flex flex-col justify-center">
                        <article class="d-flex align-center customer">
                            <img src="/images/user.png" alt="">
                            <div class="d-flex flex-col">
                                <em>Jose Luis Mbappe</em>
                                <span>Verdulero</span>
                                <div class="d-flex align-center">
                                    <i class="icon star"></i>
                                    <i class="icon star"></i>
                                    <i class="icon star"></i>
                                    <i class="icon star"></i>
                                    <i class="icon star"></i>
                                </div>
                            </div>
                        </article>
                        <aside>
                            <span>Excelente servicio que me han brindado</span>
                        </aside>
                    </li>
                    <li class="d-flex flex-col justify-center">
                        <article class="d-flex align-center customer">
                            <img src="/images/user.png" alt="">
                            <div class="d-flex flex-col">
                                <em>Pablo Javier Dembele</em>
                                <span>Kinesiologo</span>
                                <div class="d-flex align-center">
                                    <i class="icon star"></i>
                                    <i class="icon star"></i>
                                    <i class="icon star"></i>
                                    <i class="icon star"></i>
                                </div>
                            </div>
                        </article>
                        <aside>
                            <span>muy buenos servicio que me han brindado</span>
                        </aside>
                    </li>
                    <li class="d-flex flex-col justify-center">
                        <article class="d-flex align-center customer">
                            <img src="/images/user.png" alt="">
                            <div class="d-flex flex-col">
                                <em>Carlos Alberto Viatri</em>
                                <span>Cocinero</span>
                                <div class="d-flex align-center">
                                    <i class="icon star"></i>
                                    <i class="icon star"></i>
                                    <i class="icon star"></i>
                                </div>
                            </div>
                        </article>
                        <aside>
                            <span>Buenos servicio</span>
                        </aside>
                    </li>
                </ul>
            </section>
    
            <section id="cotiza" class="d-flex flex-col align-center justify-center">
                <header class="d-flex flex-col align-center justify-center">
                    <h4>Cotiza</h4>
                    <span>Completa el formulario y cotizaremos tu &eacute;xito</span>
                </header>
                <div class="d-flex">
                    <article>
                        <form data-form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <ul class="ul-form d-flex flex-col gap-1">
                                <li>
                                    <div class="input">
                                        <input type="text" id="nombre" name="nombre" >
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
                                        <input type="text" id="telefono" name="telefono" >
                                        <label for="telefono">Número de telefono</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="input">
                                        <input type="text" id="empresa" name="empresa" >
                                        <label for="empresa">Nombre de la empresa</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="input">
                                        <input type="text" id="desEmpresa" name="descripcion" >
                                        <label for="desEmpresa">Descipcion de la empresa (rubro y otros)</label>
                                    </div>
                                </li>
                                <li>
                                    <label>Seleccioná el motivo de la cotizaci&oacute;n</label>
                                    <ul class="d-flex align-start justify-start flex-wrap gap-5">
                                        <li>
                                            <input type="radio" id="sp" value="Servicios Personalizados" name="cotizacion">
                                            <label for="sp">
                                                Servicios Personalizados
                                            </label>
                                        </li>
                                        <li>
                                            <input type="radio" id="rs" value="Redes Sociales" name="cotizacion">
                                            <label for="rs">
                                                Redes Sociales
                                            </label>
                                        </li>
                                        <li>
                                            <input type="radio" id="dw" value="Diseño Web" name="cotizacion">
                                            <label for="dw">
                                                Diseño Web
                                            </label>
                                        </li>
                                        <li>
                                            <input type="radio" id="b" value="Branding" name="cotizacion">
                                            <label for="b">
                                                Branding
                                            </label>
                                        </li>
                                        <li>
                                            <input type="radio" id="dg" value="Diseño Grafico" name="cotizacion">
                                            <label for="dg">
                                                Diseño Gr&aacute;fico
                                            </label>
                                        </li>
                                        <li>
                                            <input type="radio" id="pd" value="Publicidad Digital" name="cotizacion">
                                            <label for="pd">
                                                Publicidad Digital
                                            </label>
                                        </li>
                                        <li>
                                            <input type="radio" id="otro" value="Otros" name="cotizacion">
                                            <label for="otro">
                                                Otros
                                            </label>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="btn d-flex justify-center">
                                        <button>Cotiza</button>
                                    </div>
                                    <div class="d-flex justify-center align-center">
                                        <span class="mensaje-success"><?php echo $respuestaMsg ?></span>
                                    </div>
                                </li>
                            </ul>
                        </form>
                    </article>
                    <aside>
                        SVG ANIMADO
                    </aside>
                </div>
            </section>
        </main>

        <?php include_once("includes/footer.php"); ?>
        <script type="module" src="js/index.js"></script>
    </body>
</html>