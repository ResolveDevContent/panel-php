<!DOCTYPE html>
<html lang="en">

    <?php
        session_start();

        include("../config.php");
        // require_once "../errors.php";
        
        $title = "Productos";
        include_once("../includes/head.php"); 

        $response = '<div class="loader-container d-flex justify-center">
                        <div class="loader"></div>    
                    </div>';
        
    ?>

    <body>
        <section class="d-flex">
            <?php include_once("../includes/menu.php"); ?>
            <article id="container">
                <div class="wrapper d-flex flex-col">
                    <header class="d-flex justify-between align-center">
                        <h2>Proyectos</h2>
                        <a href="create.php" class="btn btn-primary">Agregar nuevo proyecto</a>
                    </header>
                    <div class="table-wrapper">
                        <?php
                            echo $response;
                            // Include config file
                            require_once "../config.php";

                            $tabla = "proyectos";
                            $columns = "proyectoId, nombre, descripcion, website";
                            include_once("../controllers/tabla.php");
                        ?>
                    </div>
                </div>
            </article>
        </section>
    </body>
</html>