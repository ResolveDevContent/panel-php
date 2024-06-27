<!DOCTYPE html>
<html lang="en">

    <?php
        $title = "Protafolio";
        include_once "includes/head.php";  
        require_once "config.php";
        
        $destacados = '';
        $proyectos = '';

        $query = "SELECT * FROM proyectos WHERE destacado = 1";
        if($result = mysqli_query($sql, $query)) {
            if(mysqli_num_rows($result) > 0) {
                $proyectos = '<ul class="gap-1 w-100 s">';
                while($row = mysqli_fetch_array($result)) {
                    $servicios = json_decode($row['servicios'], true);
                    $proyectos .= '<li class="card">';
                        $proyectos .= "<a href='/proyecto.php?proyecto=". $row['nombre'] ."-". $row['id'] ."' class='proyectoLink'>";
                            $proyectos .= '<span class="loader"></span>';
                            $proyectos .= "<img src='". $row['portada'] ."' alt=''>";
                            $proyectos .= '<span class="prod gap-5"><span>'. $row['nombre']. '</span>';
                            foreach($servicios['servicios'] as $servicio => $value) {
                                if($value["nombre"] == $servicios['servicios'][0]["nombre"]) {
                                    $proyectos .= $value["nombre"];
                                } else {
                                    $proyectos .=  ", " .$value["nombre"];
                                }
                            }
                            $proyectos .= '</span>';
                        $proyectos .= '</a>';
                    $proyectos .= '</li>';
                }
                $proyectos .= '</ul>';
            }
        }

        $aQuery = "SELECT * FROM proyectos WHERE destacado = 1";
        if($res = mysqli_query($sql, $aQuery)) {
            if(mysqli_num_rows($res) > 0) { 
                $destacados = '<ul class="w-100 list-portafolio">';
                while($aRow = mysqli_fetch_array($res)) {
                    $servicios = json_decode($aRow['servicios'], true);
                    $destacados .= '<li>';
                        $destacados .= '<article class="d-flex proyecto">';
                            $destacados .= "<a href='/proyecto.php?proyecto=".$aRow['nombre'] ."-". $aRow['id'] ."' class='proyectoLink'>";
                                $destacados .= "<span class='loader'></span>";
                                $destacados .= "<img src='". $aRow['portada'] ."' alt=''>";
                            $destacados .= '</a>';
                            $destacados .= '<div class="d-flex flex-col align-start justify-between">';
                                $destacados .= '<div class="d-flex flex-col align-start">';
                                    $destacados .= '<em>'. $aRow['nombre'] .'</em>';
                                    $destacados .= '<span>';
                                    foreach($servicios['servicios'] as $servicio => $value) {
                                        if($value["nombre"] == $servicios['servicios'][0]["nombre"]) {
                                            $destacados .= $value["nombre"];
                                        } else {
                                            $destacados .=  ", " .$value["nombre"];
                                        }
                                    }
                                    $destacados .= '<span>';
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
            <section id="portafolio" class="d-flex flex-col align-center gap-1 slideUp">
                <header class="d-flex flex-col align-center justify-center">
                    <h2>Protafolio</h2>
                </header>
                <div class="destacados d-flex flex-col align-center text-center w-100">
                    <em>Proyectos destacados</em>
                    <p>Todos nuestros proyectos son importantes pero aqu&iacute; estan los mas destacados</p>
                    <?php if($destacados) : ?>
                        <?php 
                            echo $destacados;
                        ?>
                    <?php else: ?>
                        <div class="d-flex flex-col align-center justify-center empty-state">
                            <img src="gifs/empty-state.gif" alt="empty-state">
                            <span>No hay proyectos destacados por el momento</span>
                        </div>
                    <?php endif ?>
                </div>
                <div class="listado w-100">
                    <header class="text-center">
                        <em>Proyectos</em>
                        <p>Aqu&iacute; podra encontrar todos nuestros trabajos</p>
                    </header>
                    <?php if($proyectos) : ?>
                        <?php 
                            echo $proyectos;
                        ?>
                    <?php else: ?>
                        <div class="d-flex flex-col align-center justify-center empty-state">
                            <img src="gifs/empty-state.gif" alt="empty-state">
                            <span>No hay proyectos destacados por el momento</span>
                        </div>
                    <?php endif ?>
                </div>
            </section>
        </main>

        <?php include_once("includes/footer.php"); ?>
    </body>
</html>