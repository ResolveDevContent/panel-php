<!DOCTYPE html>
<html lang="en">

    <?php
        $title = "Protafolio";
        include_once "includes/head.php";
        require_once "config.php";
        
        $proyectoImagenes = '';
        $arrows = '';
        $redes = '<em class="vertical-text">Resultados del proyecto</em>';

        if(isset($_GET["proyecto"]) && !empty(trim($_GET["proyecto"]))){
            $query = "SELECT * FROM proyectos WHERE id = ?";
    
            if($stmt = mysqli_prepare($sql, $query)) {
                mysqli_stmt_bind_param($stmt, "i", $param);
    
                $slice = explode("-", $_GET["proyecto"]);
                $length = count($slice);
                $param = $slice[$length - 1];
    
                if(mysqli_stmt_execute($stmt)) {
                    $result = mysqli_stmt_get_result($stmt);
    
                    if($result) {
                        if(mysqli_num_rows($result) > 0) {
                            $row = mysqli_fetch_assoc($result);
                            $servicios = json_decode($row['servicios'], true);

                            $proyecto = '<header class="d-flex flex-col text-center">';
                                $proyecto .= '<h2>'. $row['nombre'] .'</h2>';
                                $proyecto .= '<span>';
                                foreach($servicios['servicios'] as $servicio => $value) {
                                    if($value["nombre"] == $servicios['servicios'][0]["nombre"]) {
                                        $proyecto .= $value["nombre"];
                                    } else {
                                        $proyecto .=  ", " .$value["nombre"];
                                    }
                                }
                                $proyecto .= '<span>';
                            $proyecto .= '</header>';
                                $proyecto .= '<div class="d-flex flex-col align-center text-center">';
                                    $proyecto .= '<em>'. $row['descripcion'] .'</em>';
                                    if($row['mail']) {
                                        $proyecto .= '<div class="d-flex align-center gap-5">';
                                            $proyecto .= '<i class="icon mail"></i>';
                                            $proyecto .= '<span>'. $row['mail'] .'</span>';
                                        $proyecto .= '</div>';
                                    }      
                                $proyecto .= '</div>';

                            if($row['facebook'] || $row['instagram'] || $row['website']) {
                                $redes = '<em class="vertical-text slideUp">Redes Sociales</em>';
                                $redes .= '<ul class="d-flex aling-center flex-col gap-1 slideUp">';
                                if($row['facebook']) {
                                    $redes .= '<li>';
                                        $redes .= "<a href='". $row['facebook'] ."' class='d-flex align-center' target='_blank' title='Facebook'>";   
                                            $redes .= '<i class="icon facebook"></i>';
                                        $redes .= '</a>';
                                    $redes .= '</li>';
                                }
                                if($row['instagram']) {
                                    $redes .= '<li>';
                                        $redes .= "<a href='". $row['instagram'] ."' class='d-flex align-center' target='_blank' title='Instagram'>";
                                            $redes .= '<i class="icon instagram"></i>';
                                        $redes .= '</a>';
                                    $redes .= '</li>';
                                }
                                if($row['website']) {
                                    $redes .= '<li>';
                                        $redes .= "<a href='". $row['website'] ."' class='d-flex align-center' target='_blank' title='Website'>";
                                            $redes .= '<i class="icon world"></i>';
                                        $redes .= '</a>';
                                    $redes .= '</li>';
                                }
                                $redes .= '</ul>';
                            }

                            $proyectoImagenes = '<ul class="d-flex align-center" data-scrollable>';
                                $proyectoImagenes .= '<li>';
                                    $proyectoImagenes .= '<span class="loader"></span>';
                                    $proyectoImagenes .= "<img src='". $row['portada'] ."' alt=''>";
                                $proyectoImagenes .= '</li>';
                        } else {
                            header("location: 404page.php");
                        }
                    } else {
                        header("location: 404page.php");
                    }
                } else {
                    header("location: 404page.php");
                }
                mysqli_stmt_close($stmt);
            } else {
                header("location: 404page.php");
            }

            $query = "SELECT * FROM proyectos_images WHERE proyectoId = ?";

            if($stmt = mysqli_prepare($sql, $query)) {
                mysqli_stmt_bind_param($stmt, "i", $param);
    
                $slice = explode("-", $_GET["proyecto"]);
                $length = count($slice);
                $param = $slice[$length - 1];
    
                if(mysqli_stmt_execute($stmt)) {
                    $result = mysqli_stmt_get_result($stmt);
    
                    if($result) {
                        if(mysqli_num_rows($result) > 0) {
                        $arrows = `<nav class="nav-arrows d-flex align-center justify-between" data-arrows>
                                        <a href="#" data-arrow="-1" class="d-flex">
                                            <i class="icon arrow-left"></i>
                                        </a>
                                        <a href="#" data-arrow="1" class="d-flex">
                                            <i class="icon arrow-right"></i>
                                        </a>
                                    </nav>`;
                        $arrows .= $proyectoImagenes;
                        $proyectoImagenes = $arrows;
                            while($row = mysqli_fetch_array($result)){
                                $proyectoImagenes .= '<li>';
                                    $proyectoImagenes .= '<span class="loader"></span>';
                                    $proyectoImagenes .= "<img src='". $row['imagen'] ."' alt=''>";
                                $proyectoImagenes .= '</li>';
                            }
                        }
                    }
                }
                    mysqli_stmt_close($stmt);
            }

            $proyectoImagenes .= '</ul>';
            mysqli_close($sql);
        } else {
            header("location: 404page.php");
        }
    ?>

    <body>
        <?php include_once("includes/navbar.php"); ?>

        <section id="banner">
            <div class="d-flex align-center">
                <aside class="d-flex align-center flex-col justify-around">
                    <?php 
                        echo $redes;
                    ?>
                </aside>
                <article data-scroll="auto">
                    <?php
                        echo $proyectoImagenes;
                    ?>
                </article>
            </div>
        </section>

        <main class="wrapper slideUp">
            <section id="proyecto" class="d-flex flex-col align-center gap-1">
                <?php
                    echo $proyecto;
                ?>
            </section>
        </main>

        <?php include_once("includes/footer.php"); ?>
    </body>
</html>