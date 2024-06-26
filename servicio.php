<!DOCTYPE html>
<html lang="en">

    <?php
        $title = "Servicio";
        include_once "includes/head.php";
        require_once "config.php";

        $row = '';
        $proyectosImg = '';

        if(isset($_GET["servicio"]) && !empty(trim($_GET["servicio"]))){
            $query = "SELECT * FROM servicios WHERE servicioId = ?";
    
            if($stmt = mysqli_prepare($sql, $query)) {
                mysqli_stmt_bind_param($stmt, "i", $param);
    
                // $slice = explode("-", $_GET["servicio"]);
                // $length = count($slice);
                // $param = implode(array_slice($slice, 0, ($length - 1)));
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
                } else {
                    header("location: 404page.php");
                }
            } else {
                header("location: 404page.php");
            }

            if($row) {
                $arrayImg = [];
                $query = "SELECT * FROM proyectos WHERE servicioId = ?";

                if($stmt = mysqli_prepare($sql, $query)) {
                    mysqli_stmt_bind_param($stmt, "i", $param);
        
                    $slice = explode("-", $_GET["servicio"]);
                    $length = count($slice);
                    $param = $slice[$length - 1];
        
                    if(mysqli_stmt_execute($stmt)) {
                        $result = mysqli_stmt_get_result($stmt);
        
                        if($result) {
                            $arrayImg = $result; 
                            include_once "/xampp/htdocs/nuevoproyecto/includes/carousel.php"; 
                            $proyectosImg = $imagenes;
                        }
                    }
                    mysqli_stmt_close($stmt);
                }
                mysqli_close($sql);
            }
        } else {
            header("location: 404page.php");
        }
    ?>

    <body class="gradient-body">
        <?php include_once("includes/navbar.php"); ?>

        <main>
            <div class="gradient modified"></div>
            <section id="servicio" class="wrapper d-flex align-center">
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
                                echo $proyectosImg;
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

        <script type="module" src="js/index.js"></script>
    </body>
</html>