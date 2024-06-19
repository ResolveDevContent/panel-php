<!DOCTYPE html>
<html lang="en">

    <?php
        $title = "Protafolio";
        include_once "includes/head.php";
        require_once "config.php";
        
        $proyectoImagenes = '';
        $arrows = '';
        $redes = '<em class="vertical-text">Resultados del proyecto</em>';
        $servicio = '<div class="d-flex flex-col align-center justify-center empty-state">
                        <span>La informaci&oacute;n no se encuntra disponible</span>
                    </div>';

        if(isset($_GET["proyectoId"]) && !empty(trim($_GET["proyectoId"]))){
            $query = "SELECT * FROM proyectos WHERE proyectoId = ?";
    
            if($stmt = mysqli_prepare($sql, $query)) {
                mysqli_stmt_bind_param($stmt, "i", $param);
    
                $param = $_GET["proyectoId"];
    
                if(mysqli_stmt_execute($stmt)) {
                    $result = mysqli_stmt_get_result($stmt);
    
                    if($result) {
                        if(mysqli_num_rows($result) > 0) {
                            $row = mysqli_fetch_assoc($result);

                            $proyecto = '<header class="d-flex flex-col text-center">
                                            <h2>'. $row['nombre'] .'</h2>
                                            <span>'. $row['servicio'] .'</span>
                                        </header>
                                        <div class="d-flex flex-col align-center text-center">
                                            <em>'. $row['descripcion'] .'</em>
                                            <div class="d-flex align-center gap-5">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                                    <path d="M20 4H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2zm0 4.7-8 5.334L4 8.7V6.297l8 5.333 8-5.333V8.7z"></path>
                                                </svg>
                                                <span>'. $row['email'] .'</span>
                                            </div>
                                        </div>';

                            if($row['facebook'] || $row['instagram'] || $row['website']) {
                                $redes = '<em class="vertical-text">Redes Sociales</em>';
                                $redes .= '<ul class="d-flex aling-center flex-col gap-5">';
                                if($row['facebook']) {
                                    $redes .= '<li>';
                                        $redes .= "<a href='". $row['facebook'] ."' class='d-flex align-center' target='_blank' title='Facebook'>";
                                            $redes .= '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12.001 2.002c-5.522 0-9.999 4.477-9.999 9.999 0 4.99 3.656 9.126 8.437 9.879v-6.988h-2.54v-2.891h2.54V9.798c0-2.508 1.493-3.891 3.776-3.891 1.094 0 2.24.195 2.24.195v2.459h-1.264c-1.24 0-1.628.772-1.628 1.563v1.875h2.771l-.443 2.891h-2.328v6.988C18.344 21.129 22 16.992 22 12.001c0-5.522-4.477-9.999-9.999-9.999z"></path></svg>';    
                                            // $redes .= '<i class="icon facebook"></i>';
                                        $redes .= '</a>';
                                    $redes .= '</li>';
                                }
                                if($row['instagram']) {
                                    $redes .= '<li>';
                                        $redes .= "<a href='". $row['instagram'] ."' class='d-flex align-center' target='_blank' title='Instagram'>";
                                            $redes .= '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.947 8.305a6.53 6.53 0 0 0-.419-2.216 4.61 4.61 0 0 0-2.633-2.633 6.606 6.606 0 0 0-2.186-.42c-.962-.043-1.267-.055-3.709-.055s-2.755 0-3.71.055a6.606 6.606 0 0 0-2.185.42 4.607 4.607 0 0 0-2.633 2.633 6.554 6.554 0 0 0-.419 2.185c-.043.963-.056 1.268-.056 3.71s0 2.754.056 3.71c.015.748.156 1.486.419 2.187a4.61 4.61 0 0 0 2.634 2.632 6.584 6.584 0 0 0 2.185.45c.963.043 1.268.056 3.71.056s2.755 0 3.71-.056a6.59 6.59 0 0 0 2.186-.419 4.615 4.615 0 0 0 2.633-2.633c.263-.7.404-1.438.419-2.187.043-.962.056-1.267.056-3.71-.002-2.442-.002-2.752-.058-3.709zm-8.953 8.297c-2.554 0-4.623-2.069-4.623-4.623s2.069-4.623 4.623-4.623a4.623 4.623 0 0 1 0 9.246zm4.807-8.339a1.077 1.077 0 0 1-1.078-1.078 1.077 1.077 0 1 1 2.155 0c0 .596-.482 1.078-1.077 1.078z"></path><circle cx="11.994" cy="11.979" r="3.003"></circle></svg>';
                                            // $redes .= '<i class="icon instagram"></i>';
                                        $redes .= '</a>';
                                    $redes .= '</li>';
                                }
                                if($row['website']) {
                                    $redes .= '<li>';
                                        $redes .= "<a href='". $row['website'] ."' class='d-flex align-center' target='_blank' title='Website'>";
                                            $redes .= '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zM4 12c0-.899.156-1.762.431-2.569L6 11l2 2v2l2 2 1 1v1.931C7.061 19.436 4 16.072 4 12zm14.33 4.873C17.677 16.347 16.687 16 16 16v-1a2 2 0 0 0-2-2h-4v-3a2 2 0 0 0 2-2V7h1a2 2 0 0 0 2-2v-.411C17.928 5.778 20 8.65 20 12a7.947 7.947 0 0 1-1.67 4.873z"></path></svg>';
                                            // $redes .= '<i class="icon world"></i>';
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
            } else {
                header("location: 404page.php");
            }

            // $query = "SELECT * FROM imagenesProyectos WHERE proyectoId = ?";

            // if($stmt = mysqli_prepare($sql, $query)) {
            //     mysqli_stmt_bind_param($stmt, "i", $param);
    
            //     $param = $_GET["proyectoId"];
    
            //     if(mysqli_stmt_execute($stmt)) {
            //         $result = mysqli_stmt_get_result($stmt);
    
            //         if($result) {
            //             if(mysqli_num_rows($result) > 0) {
                        // $arrows = `<nav class="nav-arrows d-flex align-center justify-between" data-arrows>
                        //                 <a href="#" data-arrow="-1" class="d-flex">
                        //                     <i class="icon arrow-left"></i>
                        //                 </a>
                        //                 <a href="#" data-arrow="1" class="d-flex">
                        //                     <i class="icon arrow-right"></i>
                        //                 </a>
                        //             </nav>`;
                        // $arrows .= $proyectoImagenes;
                        // $proyectoImagenes = $arrows;
            //                 while($row = mysqli_fetch_array($result)){
            //                     $proyectoImagenes .= '<li>';
            //                         $proyectoImagenes .= '<span class="loader"></span>';
            //                         $proyectoImagenes .= "<img src='". $row['portada'] ."' alt=''>";
            //                     $proyectoImagenes .= '</li>';
            //                 }
            //             }
            //         }
            //     }
            // }

            $proyectoImagenes .= '</ul>';

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
                <article>
                    <?php
                        echo $proyectoImagenes;
                    ?>
                </article>
            </div>
        </section>

        <main class="wrapper">
            <section id="proyecto" class="d-flex flex-col align-center gap-1">
                <?php
                    echo $proyecto;
                ?>
            </section>
        </main>

        <?php include_once("includes/footer.php"); ?>

        <script type="module" src="js/index.js"></script>
    </body>
</html>