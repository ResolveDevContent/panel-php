<!DOCTYPE html>
<html lang="en">

    <?php
        $title = "Protafolio";
        include_once "includes/head.php";  
        
        $destacados = '<div class="d-flex flex-col align-center justify-center empty-state">
                        <span>No hay proyectos destacados por el momento</span>
                     </div>';

        $proyectos = '<div class="d-flex flex-col align-center justify-center empty-state">
                        <span>No hay proyectos disponibles por el momento</span>
                     </div>';

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
                <header class="d-flex flex-col align-center justify-center">
                    <h2>Protafolio</h2>
                    <p>Aqu&iacute; podra encontrar todos nuestros trabajos</p>
                </header>
                <div class="destacados d-flex flex-col align-center text-center">
                    <em>Proyectos destacados</em>
                    <p>Todos nuestros proyectos son importantes pero aqu&iacute; estan los mas destacados</p>
                    <?php 
                        // echo $destacados;
                    ?>
                    <ul>
                        <li>
                            <article class="d-flex">
                                <a href="">
                                    <img src="/images/user.png" alt="">
                                </a>
                                <div class="d-flex flex-col align-start">
                                    <div class="d-flex flex-col align-start">
                                        <em>Nombre</em>
                                        <span>Servicio</span>
                                    </div>
                                    <ul class="d-flex align-center">
                                        <li>
                                            <a href="">F</a>
                                        </li>
                                        <li>
                                            <a href="">I</a>
                                        </li>
                                        <li>
                                            <a href="">P</a>
                                        </li>
                                    </ul>
                                </div>
                            </article>
                        </li>
                        <li>
                            <article class="d-flex">
                                <a href="">
                                    <img src="/images/user.png" alt="">
                                </a>
                                <div class="d-flex flex-col align-start">
                                    <div class="d-flex flex-col align-start">
                                        <em>Nombre</em>
                                        <span>Servicio</span>
                                    </div>
                                    <ul class="d-flex align-center">
                                        <li>
                                            <a href="">F</a>
                                        </li>
                                        <li>
                                            <a href="">I</a>
                                        </li>
                                        <li>
                                            <a href="">P</a>
                                        </li>
                                    </ul>
                                </div>
                            </article>
                        </li>
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