<!DOCTYPE html>
<html lang="en">

    <?php
        $title = "Servicio";
        include_once "includes/head.php";
        require_once "config.php";

        $mockups = '<div class="d-flex flex-col align-center justify-center gap-5 empty-state">
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

            $query = "SELECT * FROM proyectos WHERE servicioId = ?";

            if($stmt = mysqli_prepare($sql, $query)) {
                mysqli_stmt_bind_param($stmt, "i", $param);
    
                $param = $_GET["servicioId"];
    
                if(mysqli_stmt_execute($stmt)) {
                    $result = mysqli_stmt_get_result($stmt);
    
                    if($result) {
                        if(mysqli_num_rows($result) > 0) {
                            $mockups = '<div class="mockups d-flex align-center justify-around w-100">';
                                $mockups .= '<div class="tablet">';
                                    $mockups .= '<div class="phone">';
                                        $mockups .= '<img src="images/phone-3D.png" alt="">';
                                        $mockups .= '<img src="images/mockup.png" alt="">';
                                    $mockups .= '</div>';
                                    $mockups .= '<nav class="nav-arrows d-flex align-center justify-between" data-arrows>';
                                        $mockups .= '<a href="#" data-arrow="-1" class="d-flex">';
                                            $mockups .= '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path></svg>';
                                            // $mockups .= '<i class="icon arrow-left"></i>';
                                        $mockups .= '</a>';
                                        $mockups .= '<a href="#" data-arrow="1" class="d-flex">';
                                            $mockups .= '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path></svg>';
                                            // $mockups .= '<i class="icon arrow-right"></i>';
                                        $mockups .= '</a>';
                                    $mockups .= '</nav>';
                                    $mockups .= '<ul class="d-flex align-center" data-scrollable>';
                                        while($row = mysqli_fetch_array($result)){
                                            $mockups .= '<li>';
                                                $mockups .= '<span class="loader"></span>';
                                                $mockups .= "<img src='". $row['portada'] ."' alt=''>";
                                            $mockups .= '</li>';
                                        }
                                    $mockups .= '</ul>';
                                $mockups .= '</div>';
                            $mockups .= '</div>';
                        }
                    }
                }
            }
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
                <article class="d-flex flex-col align-center w-100" data-scroll>
                    <strong>Nuestros trabajos</strong>
                    <?php
                        echo $mockups;
                    ?>
                </article>
            </section>
        </main>

        <?php include_once("includes/footer.php"); ?>

        <script type="module" src="js/index.js"></script>
    </body>
</html>