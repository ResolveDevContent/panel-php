<!DOCTYPE html>
<html lang="en">

    <?php
        $title = "Servicio";
        include_once "includes/head.php";
        require_once "config.php";

        $mockups = '<div class="d-flex flex-col align-center justify-center gap-5 empty-state">
                        <i class="icon info"></i>
                        <span>No hay proyectos disponibles para este servicio</span>
                    </div>';

        if(isset($_GET["servicioId"]) && !empty(trim($_GET["servicioId"]))){
            $query = "SELECT * FROM servicios WHERE servicioId = ?";
    
            if($stmt = mysqli_prepare($sql, $query)) {
                mysqli_stmt_bind_param($stmt, "i", $param);
    
                $param = $_GET["servicioId"];
    
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
                } else {
                    header("location: 404page.php");
                }
            } else {
                header("location: 404page.php");
            }

            // $query = "SELECT * FROM proyectos WHERE servicioId = ?";

            // if($stmt = mysqli_prepare($sql, $query)) {
            //     mysqli_stmt_bind_param($stmt, "i", $param);
    
            //     $param = $_GET["servicioId"];
    
            //     if(mysqli_stmt_execute($stmt)) {
            //         $result = mysqli_stmt_get_result($stmt);
    
            //         if($result) {
            //             if(mysqli_num_rows($result) > 0) {
            //                 $mockups = '<img src="images/mockup.png" alt="">';
            //                 $mockups .= '<nav class="nav-arrows d-flex align-center justify-between" data-arrows>';
            //                     $mockups .= '<a href="#" data-arrow="-1" class="d-flex">';
            //                         $mockups .= '<i class="icon arrow-left"></i>';
            //                     $mockups .= '</a>';
            //                     $mockups .= '<a href="#" data-arrow="1" class="d-flex">';
            //                         $mockups .= '<i class="icon arrow-right"></i>';
            //                     $mockups .= '</a>';
            //                 $mockups .= '</nav>';
            //                 $mockups .= '<ul class="d-flex align-center" data-scrollable>';
            //                     while($row = mysqli_fetch_array($result)){
            //                         $mockups .= '<li>';
            //                             $mockups .= '<span class="loader"></span>';
            //                             $mockups .= "<img src='". $row['portada'] ."' alt=''>";
            //                         $mockups .= '</li>';
            //                     }
            //                 $mockups .= '</ul>';
            //             }
            //         }
            //     }
            // }
        } else {
            header("location: 404page.php");
        }
    ?>

    <body>
        <?php include_once("includes/navbar.php"); ?>

        <main class="wrapper">
            <section id="servicio" class="d-flex flex-col align-center">
                <aside class="d-flex flex-col text-center">
                    <?php
                        echo $servicio;
                    ?>
                </aside>
                <article class="d-flex flex-col align-center">
                    <strong>Nuestros trabajos</strong>
                    <div class="mockups">
                        <?php
                            echo $mockups;
                        ?>
                    </div>
                </article>
            </section>
        </main>

        <?php include_once("includes/footer.php"); ?>

        <script src="js/index.js"></script>
    </body>
</html>