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
                $proyectos = '<ul class="gap-1 w-100">';
                while($row = mysqli_fetch_array($result)) {
                    $proyectos .= '<li>';
                        $proyectos .= "<a href='/proyecto.php?proyecto=". $row['nombre'] ."-". $row['proyectoId'] ."'>";
                            $proyectos .= '<span class="loader"></span>';
                            $proyectos .= "<img src='". $row['portada'] ."' alt=''>";
                            $proyectos .= '<span class="prod gap-5"><span>'. $row['nombre']. '</span>';
                            $proyectos .= $row['servicio']. '</span>';
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
                            $destacados .= "<a href='/proyecto.php?proyecto=".$aRow['nombre'] ."-". $aRow['proyectoId'] ."'>";
                                $destacados .= "<span class='loader'></span>";
                                $destacados .= "<img src='". $aRow['portada'] ."' alt=''>";
                            $destacados .= '</a>';
                            $destacados .= '<div class="d-flex flex-col align-start justify-between">';
                                $destacados .= '<div class="d-flex flex-col align-start">';
                                    $destacados .= '<em>'. $aRow['nombre'] .'</em>';
                                    $destacados .= '<span>'. $aRow['servicio'] .'</span>';
                                $destacados .= '</div>';
                                $destacados .= '<ul class="d-flex align-center gap-5">';
                                    if($aRow['facebook']) {
                                        $destacados .= '<li>';
                                            $destacados .= '<div class="btn">';
                                                $destacados .= "<a href='". $aRow['facebook'] ."' target='_blank'>";
                                                    $destacados .= '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12.001 2.002c-5.522 0-9.999 4.477-9.999 9.999 0 4.99 3.656 9.126 8.437 9.879v-6.988h-2.54v-2.891h2.54V9.798c0-2.508 1.493-3.891 3.776-3.891 1.094 0 2.24.195 2.24.195v2.459h-1.264c-1.24 0-1.628.772-1.628 1.563v1.875h2.771l-.443 2.891h-2.328v6.988C18.344 21.129 22 16.992 22 12.001c0-5.522-4.477-9.999-9.999-9.999z"></path></svg>';    
                                                $destacados .= '</a>';
                                            $destacados .= '</div>';
                                        $destacados .= '</li>';
                                    }
                                    if($aRow['instagram']) {
                                        $destacados .= '<li>';
                                            $destacados .= '<div class="btn">';
                                                $destacados .= "<a href='". $aRow['instagram'] ."' target='_blank'>";
                                                    $destacados .= '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.947 8.305a6.53 6.53 0 0 0-.419-2.216 4.61 4.61 0 0 0-2.633-2.633 6.606 6.606 0 0 0-2.186-.42c-.962-.043-1.267-.055-3.709-.055s-2.755 0-3.71.055a6.606 6.606 0 0 0-2.185.42 4.607 4.607 0 0 0-2.633 2.633 6.554 6.554 0 0 0-.419 2.185c-.043.963-.056 1.268-.056 3.71s0 2.754.056 3.71c.015.748.156 1.486.419 2.187a4.61 4.61 0 0 0 2.634 2.632 6.584 6.584 0 0 0 2.185.45c.963.043 1.268.056 3.71.056s2.755 0 3.71-.056a6.59 6.59 0 0 0 2.186-.419 4.615 4.615 0 0 0 2.633-2.633c.263-.7.404-1.438.419-2.187.043-.962.056-1.267.056-3.71-.002-2.442-.002-2.752-.058-3.709zm-8.953 8.297c-2.554 0-4.623-2.069-4.623-4.623s2.069-4.623 4.623-4.623a4.623 4.623 0 0 1 0 9.246zm4.807-8.339a1.077 1.077 0 0 1-1.078-1.078 1.077 1.077 0 1 1 2.155 0c0 .596-.482 1.078-1.077 1.078z"></path><circle cx="11.994" cy="11.979" r="3.003"></circle></svg>';
                                                    // $destacados .= '<i class="icon instagram"></i>';
                                                $destacados .= '</a>';
                                            $destacados .= '</div>';
                                        $destacados .= '</li>';
                                    }
                                    if($aRow['website']) {
                                        $destacados .= '<li>';
                                            $destacados .= '<div class="btn">';
                                                $destacados .= "<a href='". $aRow['website'] ."' target='_blank'>";
                                                    $destacados .= '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zM4 12c0-.899.156-1.762.431-2.569L6 11l2 2v2l2 2 1 1v1.931C7.061 19.436 4 16.072 4 12zm14.33 4.873C17.677 16.347 16.687 16 16 16v-1a2 2 0 0 0-2-2h-4v-3a2 2 0 0 0 2-2V7h1a2 2 0 0 0 2-2v-.411C17.928 5.778 20 8.65 20 12a7.947 7.947 0 0 1-1.67 4.873z"></path></svg>';
                                                    // $destacados .= '<i class="icon world"></i>';
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