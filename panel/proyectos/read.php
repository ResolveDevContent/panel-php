<?php
// Check existence of id parameter before processing further
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    // Include config file
    require_once "../config.php";
    // require_once "../errors.php";

    // Prepare a select statement
    $sql = "SELECT * FROM proyectos WHERE id = ?";
    $sql2 = "SELECT * FROM proyectos_images WHERE proyectoId = ?";

    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_id);

        // Set parameters
        $param_id = trim($_GET["id"]);

        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);

            if(mysqli_num_rows($result) == 1){
                /* Fetch result row as an associative array. Since the result set
                contains only one row, we don't need to use while loop */
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                // Retrieve individual field value
                $nombre = $row["nombre"];
                $descripcion = $row["descripcion"];
                $servicios = json_decode($row["servicios"]);
                $instagram = $row["instagram"];
                $facebook = $row["facebook"];
                $website = $row["website"];
                $mail = $row["mail"];
                $portada = $row["portada"];
            } else{
                // URL doesn't contain valid id parameter. Redirect to error page
                header("location: error.php");
                exit();
            }

        } else{
            header("location: error.php");
            exit();
        }
    } else{
        header("location: error.php");
        exit();
    }

    if($stmt2 = mysqli_prepare($link, $sql2)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt2, "i", $param_id);

        // Set parameters
        $param_id = trim($_GET["id"]);

        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt2)){
            $result2 = mysqli_stmt_get_result($stmt2);
        } else{
            header("location: error.php");
            exit();
        }
    } else{
        header("location: error.php");
        exit();
    }


    // Close statement
    mysqli_stmt_close($stmt);
    mysqli_stmt_close($stmt2);

    // Close connection
    mysqli_close($link);
} else{
    // URL doesn't contain id parameter. Redirect to error page
    header("location: ../index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
    <?php
        $title = "Ver Proyecto";
        include_once("../includes/head.php");
    ?>

    <body>
        <section class="d-flex">
            <?php include_once("../includes/menu.php"); ?>
            <article id="container">
                <div class="wrapper">
                    <div class="form-container d-flex flex-col">
                        <a href="proyectos.php" class="d-flex align-center">
                            <i class="icon left-arrow"></i>
                            <span>Volver</span>
                        </a>
                        <header class="d-flex flex-col align-center justify-center text-center">
                            <h2>Ver Proyecto</h2>
                        </header>
                        <div class="input">
                            <label>Nombre</label>
                            <input type="text" name="nombre" class="form-control" value="<?php echo $nombre; ?>" readonly>
                        </div>
                        <div class="input">
                            <label>Descripcion</label>
                            <input type="text" name="descripcion" class="form-control" value="<?php echo $descripcion; ?>" readonly>
                        </div>
                        <div class="input">
                            <label>Servicios</label>
                            <ul class="d-flex align-center flex-wrap">
                                <?php 
                                    foreach($servicios->servicios as $servicio => $value) {
                                        echo '<li><span class="toast">' . $value->nombre . '</span></li>';
                                    }
                                ?>
                            </ul>
                        </div>
                        <div class="input">
                            <label>Instagram</label>
                            <input type="text" name="instagram" class="form-control" value="<?php echo $instagram; ?>" readonly>
                        </div>
                        <div class="input">
                            <label>Website</label>
                            <input type="text" name="website" class="form-control" value="<?php echo $website; ?>" readonly>
                        </div>
                        <div class="input">
                            <label>Facebook</label>
                            <input type="text" name="facebook" class="form-control" value="<?php echo $facebook; ?>" readonly>
                        </div>
                        <div class="input">
                            <label>Mail</label>
                            <input type="text" name="mail" class="form-control" value="<?php echo $mail; ?>" readonly>
                        </div>
                        <div class="input imagenes">
                            <label>Portada</label>
                            <figure>
                                <img src="<?php echo $portada; ?>" alt=''>
                            </figure>
                        </div>
                        <div class="d-flex flex-col imagenes">
                            <span>Imagenes</span>
                            <ul class="d-flex align-center flex-wrap">
                                <?php
                                    while($row = mysqli_fetch_array($result2)){
                                        echo "<li class='d-flex flex-col align-center justify-center'><figure><img src='{$row["imagen"]}' alt=''></figure></li>";
                                    }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </article>
        </section>
    </body>
</html>