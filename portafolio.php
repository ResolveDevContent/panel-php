<!DOCTYPE html>
<html lang="en">

    <?php
        $title = "Protafolio";
        include_once "includes/head.php";  
        
        // $destacados = '<div class="d-flex flex-col align-center justify-center">
            //             <i class="icon info"></i>
            //             <span>No hay proyectos destacados por el momento</span>
        //              </div>';

        // $proyectos = '<div class="d-flex flex-col align-center justify-center">
            //             <i class="icon info"></i>
            //             <span>No hay proyectos disponibles por el momento</span>
        //              </div>';

        // $query = "SELECT * FROM proyectos";
        // if($result = mysqli_query($sql, $query)){
        //     if(mysqli_num_rows($result) > 0){
        //         $proyectos = '<ul class="gap-1">';
        //             while($row = mysqli_fetch_array($result)){
        //                 $proyectos .= '<li>';
        //                     $proyectos .= "<a href='/proyecto.php?proyectoId=". $row['proyectoId'] ."'>";
        //                         $proyectos .= '<span class="loader"></span>';
        //                         $proyectos .= "<img src='". $row['portada']."' alt=''>";
        //                         $proyectos .= "<p>'". $row['servicio']. "'</p>";
        //                     $proyectos .= '</a>';
        //                 $proyectos .= '</li>';
        //             }
        //         $proyectos .= '</ul>';
        //     }
        // }
    ?>

    <body>
        <?php include_once("includes/navbar.php"); ?>

        <main class="wrapper">
            <section id="portafolio" class="d-flex flex-col align-center gap-1">
                <header class="d-flex flex-col align-center">
                    <h2>Protafolio</h2>
                    <p>Aqu&iacute; podra encontrar todos nuestros trabajos</p>
                </header>
                <div class="destacados d-flex flex-col align-center">
                    <em>Proyectos destacados</em>
                    <p>Todos nuestros proyectos son importantes pero aqu&iacute; estan los mas destacados</p>
                    <ul>
                        <li></li>
                    </ul>
                </div>
                <div class="listado">
                    <?php 
                        echo $proyectos;
                    ?>
                </div>
            </section>
        </main>

        <?php include_once("includes/footer.php"); ?>
    </body>
</html>