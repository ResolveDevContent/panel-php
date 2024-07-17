<!DOCTYPE html>
<html lang="en">

    <?php
        $title = "Servicio";
        include_once "includes/head.php";
        require_once "config.php";

        $row = '';
        $proyectosImg = '';
        $proyectosMobile =  '';

        if(isset($_GET["servicio"]) && !empty(trim($_GET["servicio"]))){
            $query = "SELECT * FROM servicios WHERE id = ?";

            if($stmt = mysqli_prepare($sql, $query)) {
                mysqli_stmt_bind_param($stmt, "i", $param);

                $slice = explode("-", $_GET["servicio"]);
                $length = count($slice);
                $param = $slice[$length - 1];
    
                if(mysqli_stmt_execute($stmt)) {
                    $result = mysqli_stmt_get_result($stmt);
    
                    if($result) {
                        if(mysqli_num_rows($result) > 0) {
                            $row = mysqli_fetch_assoc($result);

                            $servicio = '<em>'. $row['nombre'] .'</em>
                                        <span>'. $row['descripcion'] .'</span>';
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
            } else {
                header("location: 404page.php");
            }

            if($row) {
                $arrayImg = [];
                $query = "SELECT * FROM proyectos WHERE JSON_SEARCH(servicios, 'all', ?, NULL, '$.servicios[*].id') is not null LIMIT 10";

                if($stmt = mysqli_prepare($sql, $query)) {
                    mysqli_stmt_bind_param($stmt, "i", $param);
        
                    $slice = explode("-", $_GET["servicio"]);
                    $length = count($slice);
                    $param = $slice[$length - 1];
        
                    if(mysqli_stmt_execute($stmt)) {
                        $result = mysqli_stmt_get_result($stmt);
        
                        if($result) {
                            if(mysqli_num_rows($result) > 1) {
                                $proyectosImg .= '<nav class="nav-arrows d-flex align-center justify-between" data-arrows>
                                                <a href="#" data-arrow="-1" class="d-flex">
                                                    <i class="icon arrow-right" style="transform: rotate(-180deg)"></i>
                                                </a>
                                                <a href="#" data-arrow="1" class="d-flex">
                                                    <i class="icon arrow-right"></i>
                                                </a>
                                            </nav>';
                            }
                    
                            $proyectosImg .= '<ul class="carousel d-flex align-center w-100" data-scrollable>';
                            $proyectosMobile .= '<ul class="carousel d-flex align-center w-100" data-scrollable>';
                            
                            while($row = mysqli_fetch_array($result)) {
                                $proyectosImg .= '<li>';
                                    $proyectosImg .= '<span class="loader"></span>';
                                    $proyectosImg .= "<img src='panel/proyectos/". $row['portada'] ."' alt=''>";
                                $proyectosImg .= '</li>';

                                $proyectosMobile .= '<li>';
                                    $proyectosMobile .= '<span class="loader"></span>';
                                    $proyectosMobile .= "<img src='panel/proyectos/". $row['portada_mobile'] ."' alt=''>";
                                $proyectosMobile .= '</li>';
                            }

                            $proyectosMobile .= '</ul>';
                            $proyectosImg .= '</ul>';
                        }
                    }
                    mysqli_stmt_close($stmt);
                }
            }
        } else {
            header("location: 404page.php");
        }
        mysqli_close($sql);
    ?>

    <body>
        <?php include_once("includes/navbar.php"); ?>

        <main class="gradient-main">
            <div class="gradient modified"></div>
            <section id="servicio" class="wrapper d-flex align-center slideUp">
                <aside class="d-flex flex-col align-center justify-center text-center">
                    <?php
                        echo $servicio;
                    ?>
                </aside>
            </section>

            <section class="proyectosImg d-flex flex-col align-center">
                <strong>Nuestros trabajos</strong>
                <?php if($proyectosImg) : ?>
                    <div class="mockups d-flex align-center justify-around">
                        <div class="phone" data-scroll="auto">
                            <img src="images/phone-3d.png" alt="">
                            <?php
                                echo $proyectosMobile;
                            ?>
                        </div>
                        <div class="tablet" data-scroll>
                            <img src="images/mac.png" alt="">
                            <?php
                                echo $proyectosImg;
                            ?>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="d-flex flex-col align-center justify-center gap-5 empty-state">
                        <img src="gifs/empty-state.gif" alt="empty-state">
                        <span>No hay proyectos disponibles para este servicio</span>
                    </div>
                <?php endif ?>
            </section>
        </main>

        <?php include_once("includes/footer.php"); ?>
    </body>
</html>