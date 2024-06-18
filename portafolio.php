<!DOCTYPE html>
<html lang="en">

    <?php
        $title = "Protafolio";
        include_once "includes/head.php";  
        require_once "config.php";
        
        $destacados = '<div class="d-flex flex-col align-center justify-center empty-state">
                        <span>No hay proyectos destacados por el momento</span>
                     </div>';

        $proyectos = '<div class="d-flex flex-col align-center justify-center empty-state">
                        <span>No hay proyectos disponibles por el momento</span>
                     </div>';

        $query = "SELECT * FROM proyectos WHERE destacado = 1";
        if($result = mysqli_query($sql, $query)) {
            if(mysqli_num_rows($result) > 0) {
                $proyectos = '<ul class="gap-1 w-100">';
                while($row = mysqli_fetch_array($result)) {
                    $proyectos .= '<li>';
                        $proyectos .= "<a href='/proyecto.php?proyectoId=". $row['proyectoId'] ."'>";
                            $proyectos .= '<span class="loader"></span>';
                            $proyectos .= "<img src='". $row['portada'] ."' alt=''>";
                            $proyectos .= '<p>'. $row['servicio']. '</p>';
                        $proyectos .= '</a>';
                    $proyectos .= '</li>';
                }
                $proyectos .= '</ul>';
            }
        }

        $aQuery = "SELECT * FROM proyectos WHERE destacado = 1";
        if($res = mysqli_query($sql, $aQuery)) {
            if(mysqli_num_rows($res) > 0) { 
                $destacados = '<ul class="w-100">';
                while($aRow = mysqli_fetch_array($res)) {
                    $destacados .= '<li>';
                        $destacados .= '<article class="d-flex proyecto">';
                            $destacados .= "<a href='/proyecto.php?proyectoId=". $aRow['proyectoId'] ."'>";
                                $destacados .= "<span class='loader'></span>";
                                $destacados .= "<img src='". $aRow['portada'] ."' alt=''>";
                            $destacados .= '</a>';
                            $destacados .= '<div class="d-flex flex-col align-start">';
                                $destacados .= '<div class="d-flex flex-col align-start">';
                                    $destacados .= '<em>'. $aRow['nombre'] .'</em>';
                                    $destacados .= '<span>'. $aRow['servicio'] .'</span>';
                                $destacados .= '</div>';
                                $destacados .= '<ul class="d-flex align-center gap-5">';
                                    if($aRow['facebook']) {
                                        $destacados .= '<li>';
                                            $destacados .= '<div class="btn">';
                                                $destacados .= "<a href='". $aRow['facebook'] ."' target='_blank'>";
                                                    $destacados .= '<i class="icon facebook"></i>';
                                                $destacados .= '</a>';
                                            $destacados .= '</div>';
                                        $destacados .= '</li>';
                                    }
                                    if($aRow['instagram']) {
                                        $destacados .= '<li>';
                                            $destacados .= '<div class="btn">';
                                                $destacados .= "<a href='". $aRow['instagram'] ."' target='_blank'>";
                                                    $destacados .= '<i class="icon instagram"></i>';
                                                $destacados .= '</a>';
                                            $destacados .= '</div>';
                                        $destacados .= '</li>';
                                    }
                                    if($aRow['website']) {
                                        $destacados .= '<li>';
                                            $destacados .= '<div class="btn">';
                                                $destacados .= "<a href='". $aRow['website'] ."' target='_blank'>";
                                                    $destacados .= '<i class="icon world"></i>';
                                                $destacados .= '</a>';
                                            $destacados .= '</div>';
                                        $destacados .= '</li>';
                                    }
                                $destacados .= '</ul>';
                            $destacados .= '</div>';
                        $destacados .= '</article>';
                    $destacados .= '</li>';
                }
                $destacados .= '</ul>';
            }
        }
    ?>

    <body>
        <?php include_once("includes/navbar.php"); ?>

        <main class="wrapper">
            <section id="portafolio" class="d-flex flex-col align-center gap-1">
                <header class="d-flex flex-col align-center justify-center">
                    <h2>Protafolio</h2>
                </header>
                <div class="destacados d-flex flex-col align-center text-center">
                    <em>Proyectos destacados</em>
                    <p>Todos nuestros proyectos son importantes pero aqu&iacute; estan los mas destacados</p>
                    <?php 
                        echo $destacados;
                    ?>
                </div>
                <div class="listado">
                    <header class="text-center">
                        <em>Proyectos</em>
                        <p>Aqu&iacute; podra encontrar todos nuestros trabajos</p>
                    </header>
                    <?php 
                        echo $proyectos;
                    ?>
                </div>
            </section>
        </main>

        <?php include_once("includes/footer.php"); ?>
    </body>
</html>