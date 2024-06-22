<?php
    // Define variables and initialize with empty values
    $nombre = $telefono = $empresa = $descripcion = $pais = $cotizacion = "";
    $nombre_err = $telefono_err = $empresa_err = $descripcion_err = $pais_err = $cotizacion_err = "";
    $respuestaMsg = "";
    $isSend = false;

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
            $isSend = $send;
        }
    }

    require_once "config.php";

    $arrayImg = [];
    $query = "SELECT * FROM proyectos";
    if($result = mysqli_query($sql, $query)){
        if(mysqli_num_rows($result) > 0) {
            $arrayImg = $result;
        }
    }
    
    include_once "/xampp/htdocs/nuevoproyecto/includes/carousel.php"; 
    $proyectosImg = $imagenes;
?>

<!DOCTYPE html>
<html lang="en">

    <?php
        $title = "Panel";
        include_once "includes/head.php";

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
                        
                        $introduccion .= "<section id='". $row['nombre'] ."' class='tab-content text-center'>";
                            $introduccion .= '<em>' .$row['nombre'] .'</em>';
                            $introduccion .= '<span>' .$row['introduccion'] .'</span>';
                            $introduccion .= '<img src="' .$row['imagen'] .'" alt="">';
                            $introduccion .= '<div class="btn">';
                                $introduccion .= "<a href='/servicio.php?servicio=". $row['slug'] ."'>Ver m&aacute;s</a>";
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

    <body class="is-loading">
        <div id="preloader">
            <img src="/images/resolvedevverde.png" alt="logo">
        </div>
        
        <?php include_once("includes/navbar.php"); ?>

        <section id="inicio">
            <ul>
                <li>
                    <figure>
                        <video autoplay loop muted>
                            <source src="videos/banner.MP4" type="video/mp4">
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
            <section id="sobre-nosotros" class="d-flex align-center">
                <aside class="d-flex align-center justify-center">
                    <img src="/panel-php/gifs/about.gif" alt="">
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
                            <span>Nos encontramos en</span>
                            <div class="d-flex align-center justifi-center gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 40 40"><defs><style>.cls-1{fill:none;}.cls-2{clip-path:url(#clip-path);}.cls-3{fill:#75acde;}.cls-4{fill:#fff;}.cls-10,.cls-11,.cls-5,.cls-6,.cls-7,.cls-8{fill:#f7b515;stroke:#853512;}.cls-5{stroke-width:0.12px;}.cls-6,.cls-8{stroke-width:0.12px;}.cls-7{stroke-width:0.12px;}.cls-9{fill:#853512;}.cls-10{stroke-width:0.12px;}.cls-11{stroke-width:0.16px;}.cls-12{fill:#853612;}</style><clipPath id="clip-path"><circle class="cls-1" cx="20" cy="20" r="20"/></clipPath></defs><g id="Capa_2" data-name="Capa 2"><g id="Capa_1-2" data-name="Capa 1"><g class="cls-2"><rect class="cls-3" x="-21.74" y="-6.09" width="83.48" height="52.17"/><rect class="cls-4" x="-21.74" y="11.3" width="83.48" height="17.39"/><g id="rays"><path id="ray1" class="cls-5" d="M19.67,20.14l3,6.47s.05.12.13.08,0-.15,0-.15l-2.47-6.68m-.07,2.52c0,1,.57,1.53.49,2.4a3.14,3.14,0,0,0,.51,1.72c.12.34-.12.55,0,.6s.32-.23.25-.71-.44-.63-.35-1.7-.44-1.33-.31-2.31"/><path id="ray1-2" data-name="ray1" class="cls-6" d="M19.64,20l.27,7.11s0,.14.09.14.09-.14.09-.14L20.36,20m-1,2.3c-.41.89-.06,1.62-.47,2.41a3.13,3.13,0,0,0-.18,1.78c0,.36-.32.46-.25.54s.38-.08.5-.56-.16-.75.33-1.71.1-1.39.59-2.24"/><path id="ray1-3" data-name="ray1" class="cls-7" d="M19.67,19.86,17.2,26.54s-.06.12,0,.15.13-.08.13-.08l3-6.47M18.5,21.87c-.72.67-.68,1.48-1.35,2a3.11,3.11,0,0,0-.85,1.58c-.17.32-.47.3-.44.41s.38.07.68-.33.13-.75.95-1.45.63-1.25,1.41-1.85"/><path id="ray1-4" data-name="ray1" class="cls-8" d="M19.75,19.75,14.91,25s-.1.09,0,.15.15,0,.15,0l5.22-4.84m-2.35.9c-.92.34-1.19,1.11-2,1.37a3.08,3.08,0,0,0-1.39,1.14c-.27.23-.55.09-.56.2s.33.22.75,0,.41-.64,1.44-1,1.05-.91,2-1.16"/><path id="ray2" class="cls-9" d="M20.45,22.55c.05.94.58,1.36.48,2.22.23-.68-.33-1.21-.3-2.21m-.79-2.48,2,4.44-1.71-4.58"/><path id="ray2-2" data-name="ray2" class="cls-9" d="M19.44,22.53c-.32.89,0,1.48-.41,2.23.47-.54.16-1.24.58-2.16M19.82,20,20,24.89,20.17,20"/><path id="ray2-3" data-name="ray2" class="cls-9" d="M18.52,22.12c-.64.7-.55,1.38-1.24,1.91.65-.32.63-1.09,1.36-1.77m1.19-2.32-1.71,4.58,2-4.45"/><path id="ray2-4" data-name="ray2" class="cls-9" d="M17.82,21.39c-.86.41-1,1.06-1.87,1.29.71,0,1-.76,1.93-1.12m2-1.68-3.32,3.58,3.58-3.33"/></g><g id="rays-2" data-name="rays"><path id="ray1-5" data-name="ray1" class="cls-5" d="M19.86,19.67l-6.47,3s-.12.05-.08.13.15,0,.15,0l6.68-2.47m-2.52-.07c-1,0-1.53.57-2.4.49a3.14,3.14,0,0,0-1.72.51c-.34.12-.55-.12-.6,0s.23.32.71.25.63-.44,1.7-.35,1.33-.44,2.31-.31"/><path id="ray1-6" data-name="ray1" class="cls-8" d="M20,19.64l-7.11.27s-.14,0-.14.09.14.09.14.09l7.11.27m-2.3-1c-.89-.41-1.62-.06-2.41-.47a3.13,3.13,0,0,0-1.78-.18c-.36,0-.46-.32-.54-.25s.08.38.56.5.75-.16,1.71.33,1.39.1,2.24.59"/><path id="ray1-7" data-name="ray1" class="cls-7" d="M20.14,19.67,13.46,17.2s-.12-.06-.15,0,.08.13.08.13l6.47,3M18.13,18.5c-.67-.72-1.48-.68-2-1.35a3.11,3.11,0,0,0-1.58-.85c-.32-.17-.3-.47-.41-.44s-.07.38.33.68.75.13,1.45.95,1.25.63,1.85,1.41"/><path id="ray1-8" data-name="ray1" class="cls-6" d="M20.25,19.75,15,14.91s-.09-.1-.15,0,0,.15,0,.15l4.84,5.22m-.9-2.35c-.34-.92-1.11-1.19-1.37-2a3.08,3.08,0,0,0-1.14-1.39c-.23-.27-.09-.55-.2-.56s-.22.33,0,.75.64.41,1,1.44.91,1.05,1.16,2"/><path id="ray2-5" data-name="ray2" class="cls-9" d="M17.45,20.45c-.94.05-1.36.58-2.22.48.68.23,1.21-.33,2.21-.3m2.48-.79-4.44,2,4.58-1.71"/><path id="ray2-6" data-name="ray2" class="cls-9" d="M17.47,19.44c-.89-.32-1.48,0-2.23-.41.54.47,1.24.16,2.16.58m2.59.21L15.11,20l4.88.17"/><path id="ray2-7" data-name="ray2" class="cls-9" d="M17.88,18.52c-.7-.64-1.38-.55-1.91-1.24.32.65,1.09.63,1.77,1.36m2.32,1.19-4.58-1.71,4.45,2"/><path id="ray2-8" data-name="ray2" class="cls-9" d="M18.61,17.82c-.41-.86-1.06-1-1.29-1.87,0,.71.76,1,1.12,1.93m1.68,2-3.58-3.32,3.33,3.58"/></g><g id="rays-3" data-name="rays"><path id="ray1-9" data-name="ray1" class="cls-5" d="M20.33,19.86l-3-6.47s-.05-.12-.13-.08,0,.15,0,.15l2.47,6.68m.07-2.52c0-1-.57-1.53-.49-2.4a3.14,3.14,0,0,0-.51-1.72c-.12-.34.12-.55,0-.6s-.32.23-.25.71.44.63.35,1.7.44,1.33.31,2.31"/><path id="ray1-10" data-name="ray1" class="cls-6" d="M20.36,20l-.27-7.11s0-.14-.09-.14-.09.14-.09.14L19.64,20m1-2.3c.41-.89.06-1.62.47-2.41a3.13,3.13,0,0,0,.18-1.78c0-.36.32-.46.25-.54s-.38.08-.5.56.16.75-.33,1.71-.1,1.39-.59,2.24"/><path id="ray1-11" data-name="ray1" class="cls-7" d="M20.33,20.14l2.47-6.68s.06-.12,0-.15-.13.08-.13.08l-3,6.47m1.83-1.73c.72-.67.68-1.48,1.35-2a3.11,3.11,0,0,0,.85-1.58c.17-.32.47-.3.44-.41s-.38-.07-.68.33-.13.75-.95,1.45-.63,1.25-1.41,1.85"/><path id="ray1-12" data-name="ray1" class="cls-8" d="M20.25,20.25,25.09,15s.1-.09,0-.15-.15,0-.15,0l-5.22,4.84m2.35-.9c.92-.34,1.19-1.11,2-1.37a3.08,3.08,0,0,0,1.39-1.14c.27-.23.55-.09.56-.2s-.33-.22-.75,0-.41.64-1.44,1-1.05.91-2,1.16"/><path id="ray2-9" data-name="ray2" class="cls-9" d="M19.55,17.45c-.05-.94-.58-1.36-.48-2.22-.23.68.33,1.21.3,2.21m.79,2.48-2-4.44,1.71,4.58"/><path id="ray2-10" data-name="ray2" class="cls-9" d="M20.56,17.47c.32-.89,0-1.48.41-2.23-.47.54-.16,1.24-.58,2.16M20.18,20,20,15.11,19.83,20"/><path id="ray2-11" data-name="ray2" class="cls-9" d="M21.48,17.88c.64-.7.55-1.38,1.24-1.91-.65.32-.63,1.09-1.36,1.77m-1.19,2.32,1.71-4.58-2,4.45"/><path id="ray2-12" data-name="ray2" class="cls-9" d="M22.18,18.61c.86-.41,1-1.06,1.87-1.29-.71,0-1,.76-1.93,1.12m-2,1.68,3.32-3.58-3.58,3.33"/></g><g id="rays-4" data-name="rays"><path id="ray1-13" data-name="ray1" class="cls-5" d="M20.14,20.33l6.47-3s.12-.05.08-.13-.15,0-.15,0l-6.68,2.47m2.52.07c1,0,1.53-.57,2.4-.49a3.14,3.14,0,0,0,1.72-.51c.34-.12.55.12.6,0s-.23-.32-.71-.25-.63.44-1.7.35-1.33.44-2.31.31"/><path id="ray1-14" data-name="ray1" class="cls-10" d="M20,20.36l7.11-.27s.14,0,.14-.09-.14-.09-.14-.09L20,19.64m2.3,1c.89.41,1.62.06,2.41.47a3.13,3.13,0,0,0,1.78.18c.36,0,.46.32.54.25s-.08-.38-.56-.5-.75.16-1.71-.33-1.39-.1-2.24-.59"/><path id="ray1-15" data-name="ray1" class="cls-7" d="M19.86,20.33l6.68,2.47s.12.06.15,0-.08-.13-.08-.13l-6.47-3m1.73,1.83c.67.72,1.48.68,2,1.35a3.11,3.11,0,0,0,1.58.85c.32.17.3.47.41.44s.07-.38-.33-.68-.75-.13-1.45-.95-1.25-.63-1.85-1.41"/><path id="ray1-16" data-name="ray1" class="cls-6" d="M19.75,20.25,25,25.09s.09.1.15,0,0-.15,0-.15l-4.84-5.22m.9,2.35c.34.92,1.11,1.19,1.37,2a3.08,3.08,0,0,0,1.14,1.39c.23.27.09.55.2.56s.22-.33,0-.75-.64-.41-1-1.44-.91-1.05-1.16-2"/><path id="ray2-13" data-name="ray2" class="cls-9" d="M22.55,19.55c.94-.05,1.36-.58,2.22-.48-.68-.23-1.21.33-2.21.3m-2.48.79,4.44-2-4.58,1.71"/><path id="ray2-14" data-name="ray2" class="cls-9" d="M22.53,20.56c.89.32,1.48,0,2.23.41-.54-.47-1.24-.16-2.16-.58M20,20.18,24.89,20,20,19.83"/><path id="ray2-15" data-name="ray2" class="cls-9" d="M22.12,21.48c.7.64,1.38.55,1.91,1.24-.32-.65-1.09-.63-1.77-1.36m-2.32-1.19,4.58,1.71-4.45-2"/><path id="ray2-16" data-name="ray2" class="cls-9" d="M21.39,22.18c.41.86,1.06,1,1.29,1.87,0-.71-.76-1-1.12-1.93m-1.68-2,3.58,3.32-3.33-3.58"/></g><circle class="cls-11" cx="20" cy="20" r="2.9"/><path id="loweyecontour" class="cls-12" d="M21,19.38a.59.59,0,0,0-.5.26.9.9,0,0,0,1.05,0,.79.79,0,0,0-.55-.24Zm0,.05c.2,0,.38.08.4.17a.59.59,0,0,1-.8,0,.48.48,0,0,1,.4-.21Z"/><path id="uppalpebra" class="cls-9" d="M21,19.24a.59.59,0,0,0-.49.18.61.61,0,0,1-.23.11s0,.09.05.07a1.34,1.34,0,0,0,.26-.18.58.58,0,0,1,.41-.11c.4,0,.62.33.66.31s-.22-.38-.66-.38Z"/><path id="eyebrow_nose" data-name="eyebrow nose" class="cls-9" d="M21.83,19.38a1.15,1.15,0,0,0-1.52-.18.76.76,0,0,0-.16.37,1.05,1.05,0,0,0,.23.81.18.18,0,0,0-.09,0,1.53,1.53,0,0,1-.18-1,1.25,1.25,0,0,1,.07-.26,1.07,1.07,0,0,1,1.65.23Z"/><circle id="pupil" class="cls-9" cx="20.98" cy="19.6" r="0.2"/><path id="lowpalpebra" class="cls-9" d="M21.56,19.73a.89.89,0,0,1-1,.14c-.22-.14-.22-.18-.18-.18s.09,0,.27.13a1.09,1.09,0,0,0,.89-.09Z"/><path class="cls-9" d="M19.56,20.4a.2.2,0,0,0-.17.2.21.21,0,0,0,.21.2.19.19,0,0,0,.16-.09.41.41,0,0,0,.24.07h0a.43.43,0,0,0,.24-.07.18.18,0,0,0,.16.09.2.2,0,0,0,.2-.2.2.2,0,0,0-.16-.2.14.14,0,0,1,.09.13.13.13,0,0,1-.14.13.13.13,0,0,1-.13-.13.31.31,0,0,1-.28.18.29.29,0,0,1-.27-.18.14.14,0,0,1-.14.13.13.13,0,0,1-.13-.13.13.13,0,0,1,.09-.13Z"/><path class="cls-9" d="M19.77,21c-.22,0-.31.21-.51.34a3.53,3.53,0,0,0,.36-.22c.15-.09.29,0,.38,0h0c.09,0,.22-.11.38,0a2.69,2.69,0,0,0,.36.22c-.2-.13-.3-.34-.52-.34a.75.75,0,0,0-.22.07h0A.71.71,0,0,0,19.77,21Z"/><path class="cls-9" d="M19.7,21.26a1.34,1.34,0,0,0-.37.07c.4-.09.49.05.67.05h0c.18,0,.27-.14.67-.05a1.26,1.26,0,0,0-.67,0h0a2.11,2.11,0,0,0-.3,0Z"/><path class="cls-9" d="M19.35,21.33h-.09c.47.05.25.31.74.31h0c.49,0,.27-.26.74-.31-.49,0-.34.25-.74.25h0c-.38,0-.26-.26-.65-.25Z"/><path class="cls-9" d="M20.4,22.05a.4.4,0,1,0-.8,0,.41.41,0,0,1,.8,0Z"/><path id="eyebrow_nose-2" data-name="eyebrow nose" class="cls-9" d="M18.2,19.38a1.14,1.14,0,0,1,1.51-.18.78.78,0,0,1,.17.37,1.05,1.05,0,0,1-.23.81l.09,0a1.59,1.59,0,0,0,.18-1,2.5,2.5,0,0,0-.07-.26,1.07,1.07,0,0,0-1.65.23Z"/><path id="uppalpebra-2" data-name="uppalpebra" class="cls-9" d="M19,19.24a.59.59,0,0,1,.49.18.54.54,0,0,0,.22.11s0,.09,0,.07a1.29,1.29,0,0,1-.27-.18.56.56,0,0,0-.4-.11c-.4,0-.62.33-.67.31a.7.7,0,0,1,.67-.38Z"/><path id="loweyecontour-2" data-name="loweyecontour" class="cls-12" d="M19,19.38a.59.59,0,0,0-.5.26.9.9,0,0,0,1.05,0,.81.81,0,0,0-.55-.24Zm0,.05c.2,0,.38.08.4.17a.59.59,0,0,1-.8,0,.46.46,0,0,1,.4-.21Z"/><circle id="pupil-2" data-name="pupil" class="cls-9" cx="19.01" cy="19.6" r="0.2"/><path id="lowpalpebra-2" data-name="lowpalpebra" class="cls-9" d="M18.47,19.73a.88.88,0,0,0,1,.14c.22-.14.22-.18.17-.18s-.08,0-.26.13a1.09,1.09,0,0,1-.89-.09Z"/></g></g></g></svg>
                                <!-- <i class="argentina"></i> -->
                                <!-- <i class="mexico"></i> -->
                            </div>
                        </div>
                        <div class="d-flex align-center btn gap-1">
                            <a href="/panel-php/nosotros.php">Conoce m&aacute;s</a>
                            <a href="/panel-php/unete.php">Trabaj&aacute; con nosotros</a>
                        </div>
                    </div>
                </article>
            </section>
        </main>

        <?php if($proyectosImg) : ?>
            <section id="proyectos" data-scroll="auto">
                <?php
                    echo $proyectosImg;
                ?>
            </section>
        <?php endif ?>

        <main class="wrapper">
            <?php if($servicios) : ?>
                <section id="servicios" class="d-flex flex-col align-center text-center">
                    <header>
                        <h4>Servicios</h4>
                        <span>Desliz&aacute; para ver todos nuestros servicios</span>
                    </header>
                    <article class="d-flex w-100">
                        <?php
                            echo $servicios;
                        ?>
                    </article>
                </section>
            <?php endif ?>

            <section id="metricas" class="d-flex flex-col align-center justify-center">
                <header class="d-flex align-center justify-center w-100">
                    <div class="d-flex align-center justify-center flex-col text-center">
                        <h4>Nuestras m&eacute;tricas</h4>
                        <span>Aqu&iacute; estan los resultados de nuestros servicios</span>
                    </div>
                </header>
                <ul class="d-flex align-center justify-start gap-1">
                    <li>
                        <span class="loader"></span>
                        <img src="/images/Attitours.jpg" alt="">
                    </li>
                    <li>
                        <span class="loader"></span>
                        <img src="/images/Attitours.jpg" alt="">
                    </li>
                    <li>
                        <span class="loader"></span>
                        <img src="/images/Attitours.jpg" alt="">
                    </li>
                </ul>
            </section>
    
            <section id="reviews" class="d-flex flex-col align-center justify-center">
                <header class="d-flex align-center justify-center w-100">
                    <div class="d-flex align-center justify-center flex-col">
                        <h4>Ellos nos recomiendan</h4>
                        <span>Nuestros clientes satisfechos nos califican</span>
                    </div>
                    <aside>
                        <img src="/panel-php/gifs/reviews.gif" alt="">
                    </aside>
                </header>
                <ul class="d-flex align-center justify-start gap-1">
                    <li class="d-flex flex-col justify-start">
                        <article class="d-flex align-center customer">
                            <img src="/panel-php/images/user.png" alt="">
                            <div class="d-flex flex-col">
                                <em>Ejemplo usuario 1</em>
                                <span>Ejemplo empresa</span>
                                <div class="d-flex align-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                        <path d="M21.947 9.179a1.001 1.001 0 0 0-.868-.676l-5.701-.453-2.467-5.461a.998.998 0 0 0-1.822-.001L8.622 8.05l-5.701.453a1 1 0 0 0-.619 1.713l4.213 4.107-1.49 6.452a1 1 0 0 0 1.53 1.057L12 18.202l5.445 3.63a1.001 1.001 0 0 0 1.517-1.106l-1.829-6.4 4.536-4.082c.297-.268.406-.686.278-1.065z"></path>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                        <path d="M21.947 9.179a1.001 1.001 0 0 0-.868-.676l-5.701-.453-2.467-5.461a.998.998 0 0 0-1.822-.001L8.622 8.05l-5.701.453a1 1 0 0 0-.619 1.713l4.213 4.107-1.49 6.452a1 1 0 0 0 1.53 1.057L12 18.202l5.445 3.63a1.001 1.001 0 0 0 1.517-1.106l-1.829-6.4 4.536-4.082c.297-.268.406-.686.278-1.065z"></path>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                        <path d="M21.947 9.179a1.001 1.001 0 0 0-.868-.676l-5.701-.453-2.467-5.461a.998.998 0 0 0-1.822-.001L8.622 8.05l-5.701.453a1 1 0 0 0-.619 1.713l4.213 4.107-1.49 6.452a1 1 0 0 0 1.53 1.057L12 18.202l5.445 3.63a1.001 1.001 0 0 0 1.517-1.106l-1.829-6.4 4.536-4.082c.297-.268.406-.686.278-1.065z"></path>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                        <path d="M21.947 9.179a1.001 1.001 0 0 0-.868-.676l-5.701-.453-2.467-5.461a.998.998 0 0 0-1.822-.001L8.622 8.05l-5.701.453a1 1 0 0 0-.619 1.713l4.213 4.107-1.49 6.452a1 1 0 0 0 1.53 1.057L12 18.202l5.445 3.63a1.001 1.001 0 0 0 1.517-1.106l-1.829-6.4 4.536-4.082c.297-.268.406-.686.278-1.065z"></path>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                        <path d="M21.947 9.179a1.001 1.001 0 0 0-.868-.676l-5.701-.453-2.467-5.461a.998.998 0 0 0-1.822-.001L8.622 8.05l-5.701.453a1 1 0 0 0-.619 1.713l4.213 4.107-1.49 6.452a1 1 0 0 0 1.53 1.057L12 18.202l5.445 3.63a1.001 1.001 0 0 0 1.517-1.106l-1.829-6.4 4.536-4.082c.297-.268.406-.686.278-1.065z"></path>
                                    </svg>
                                    <!-- <i class="icon star"></i>
                                    <i class="icon star"></i>
                                    <i class="icon star"></i>
                                    <i class="icon star"></i>
                                    <i class="icon star"></i> -->
                                </div>
                            </div>
                        </article>
                        <aside>
                            <span>Ejemplo de reseña</span>
                        </aside>
                    </li>
                    <li class="d-flex flex-col justify-start">
                        <article class="d-flex align-center customer">
                            <img src="/panel-php/images/user.png" alt="">
                            <div class="d-flex flex-col">
                                <em>Ejemplo usuario 2</em>
                                <span>Ejemplo empresa</span>
                                <div class="d-flex align-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                        <path d="M21.947 9.179a1.001 1.001 0 0 0-.868-.676l-5.701-.453-2.467-5.461a.998.998 0 0 0-1.822-.001L8.622 8.05l-5.701.453a1 1 0 0 0-.619 1.713l4.213 4.107-1.49 6.452a1 1 0 0 0 1.53 1.057L12 18.202l5.445 3.63a1.001 1.001 0 0 0 1.517-1.106l-1.829-6.4 4.536-4.082c.297-.268.406-.686.278-1.065z"></path>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                        <path d="M21.947 9.179a1.001 1.001 0 0 0-.868-.676l-5.701-.453-2.467-5.461a.998.998 0 0 0-1.822-.001L8.622 8.05l-5.701.453a1 1 0 0 0-.619 1.713l4.213 4.107-1.49 6.452a1 1 0 0 0 1.53 1.057L12 18.202l5.445 3.63a1.001 1.001 0 0 0 1.517-1.106l-1.829-6.4 4.536-4.082c.297-.268.406-.686.278-1.065z"></path>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                        <path d="M21.947 9.179a1.001 1.001 0 0 0-.868-.676l-5.701-.453-2.467-5.461a.998.998 0 0 0-1.822-.001L8.622 8.05l-5.701.453a1 1 0 0 0-.619 1.713l4.213 4.107-1.49 6.452a1 1 0 0 0 1.53 1.057L12 18.202l5.445 3.63a1.001 1.001 0 0 0 1.517-1.106l-1.829-6.4 4.536-4.082c.297-.268.406-.686.278-1.065z"></path>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                        <path d="M21.947 9.179a1.001 1.001 0 0 0-.868-.676l-5.701-.453-2.467-5.461a.998.998 0 0 0-1.822-.001L8.622 8.05l-5.701.453a1 1 0 0 0-.619 1.713l4.213 4.107-1.49 6.452a1 1 0 0 0 1.53 1.057L12 18.202l5.445 3.63a1.001 1.001 0 0 0 1.517-1.106l-1.829-6.4 4.536-4.082c.297-.268.406-.686.278-1.065z"></path>
                                    </svg>
                                    <!-- <i class="icon star"></i>
                                    <i class="icon star"></i>
                                    <i class="icon star"></i>
                                    <i class="icon star"></i> -->
                                </div>
                            </div>
                        </article>
                        <aside>
                            <span>Ejemplo de reseña</span>
                        </aside>
                    </li>
                    <li class="d-flex flex-col justify-start">
                        <article class="d-flex align-center customer">
                            <img src="/panel-php/images/user.png" alt="">
                            <div class="d-flex flex-col">
                                <em>Ejemplo usuario 3</em>
                                <span>Ejemplo empresa</span>
                                <div class="d-flex align-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                        <path d="M21.947 9.179a1.001 1.001 0 0 0-.868-.676l-5.701-.453-2.467-5.461a.998.998 0 0 0-1.822-.001L8.622 8.05l-5.701.453a1 1 0 0 0-.619 1.713l4.213 4.107-1.49 6.452a1 1 0 0 0 1.53 1.057L12 18.202l5.445 3.63a1.001 1.001 0 0 0 1.517-1.106l-1.829-6.4 4.536-4.082c.297-.268.406-.686.278-1.065z"></path>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                        <path d="M21.947 9.179a1.001 1.001 0 0 0-.868-.676l-5.701-.453-2.467-5.461a.998.998 0 0 0-1.822-.001L8.622 8.05l-5.701.453a1 1 0 0 0-.619 1.713l4.213 4.107-1.49 6.452a1 1 0 0 0 1.53 1.057L12 18.202l5.445 3.63a1.001 1.001 0 0 0 1.517-1.106l-1.829-6.4 4.536-4.082c.297-.268.406-.686.278-1.065z"></path>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                        <path d="M21.947 9.179a1.001 1.001 0 0 0-.868-.676l-5.701-.453-2.467-5.461a.998.998 0 0 0-1.822-.001L8.622 8.05l-5.701.453a1 1 0 0 0-.619 1.713l4.213 4.107-1.49 6.452a1 1 0 0 0 1.53 1.057L12 18.202l5.445 3.63a1.001 1.001 0 0 0 1.517-1.106l-1.829-6.4 4.536-4.082c.297-.268.406-.686.278-1.065z"></path>
                                    </svg>
                                    <!-- <i class="icon star"></i>
                                    <i class="icon star"></i>
                                    <i class="icon star"></i> -->
                                </div>
                            </div>
                        </article>
                        <aside>
                            <span>Ejemplo de reseña</span>
                        </aside>
                    </li>
                </ul>
            </section>
    
            <section id="cotiza" class="d-flex flex-col align-center justify-center">
                <header class="d-flex flex-col align-center justify-center">
                    <h4>Cotiza</h4>
                    <span>Completa el formulario y cotizaremos tu &eacute;xito</span>
                </header>
                <div class="d-flex align-start ">
                    <article>
                        <form data-form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <ul class="ul-form d-flex flex-col gap-1">
                                <li>
                                    <div class="input">
                                        <input type="text" id="nombre" name="nombre" >
                                        <label for="nombre">Nombre y apellido</label>
                                        <span><?php echo $nombre_err ?></span>
                                    </div>
                                </li>
                                <li>
                                    <div class="input">
                                        <label for="pais">Pais</label>
                                        <div class="input" data-paises></div>
                                        <span><?php echo $pais_err ?></span>
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
                                        <span><?php echo $telefono_err ?></span>
                                    </div>
                                </li>
                                <li>
                                    <div class="input">
                                        <input type="text" id="empresa" name="empresa" >
                                        <label for="empresa">Nombre de la empresa</label>
                                        <span><?php echo $empresa_err ?></span>
                                    </div>
                                </li>
                                <li>
                                    <div class="input">
                                        <input type="text" id="desEmpresa" name="descripcion" >
                                        <label for="desEmpresa">Descipcion de la empresa (rubro y otros)</label>
                                        <span><?php echo $descripcion_err ?></span>
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
                                    <span><?php echo $cotizacion_err ?></span>
                                </li>
                                <li>
                                    <div class="btn d-flex justify-center">
                                        <button>Cotiza</button>
                                    </div>
                                </li>
                            </ul>
                        </form>
                    </article>
                    <aside>
                        <img src="/panel-php/gifs/contacto.gif" alt="">
                    </aside>
                </div>
            </section>

            <?php if($isSend) : ?>
                <div class="notification_card">
                    <div class="notification_body">
                        <i class="icon notification"></i>
                        <?php echo $respuestaMsg; ?>
                    </div>
                    <div class="notification_progress"></div>
                </div>
            <?php endif ?>

        </main>

        <?php include_once("includes/footer.php"); ?>
        <script type="module" src="js/index.js"></script>
    </body>
</html>