<?php
// Check existence of id parameter before processing further
if(isset($_GET["proyectoId"]) && !empty(trim($_GET["proyectoId"]))){
    // Include config file
    require_once "../config.php";
    // require_once "../errors.php";

    // Prepare a select statement
    $sql = "SELECT * FROM proyectos WHERE proyectoId = ?";
    $sql2 = "SELECT * FROM proyectos_images WHERE proyectoId = ?";

    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_proyectoId);

        // Set parameters
        $param_proyectoId = trim($_GET["proyectoId"]);

        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);

            if(mysqli_num_rows($result) == 1){
                /* Fetch result row as an associative array. Since the result set
                contains only one row, we don't need to use while loop */
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                // Retrieve individual field value
                $nombre = $row["nombre"];
                $stock = $row["stock"];
                $precio = $row["precio"];
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
        mysqli_stmt_bind_param($stmt2, "i", $param_proyectoId);

        // Set parameters
        $param_proyectoId = trim($_GET["proyectoId"]);

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
        $title = "Ver producto";
        include_once("../includes/head.php");
    ?>

    <body>
        <section class="d-flex">
            <?php include_once("../includes/menu.php"); ?>
            <article id="container">
                <div class="wrapper">
                    <div class="form-container d-flex flex-col">
                        <a href="productos.php" class="d-flex align-center">
                            <i class="icon left-arrow"></i>
                            <span>Volver</span>
                        </a>
                        <header class="d-flex flex-col align-center justify-center text-center">
                            <h2>Ver Producto</h2>
                        </header>
                        <div class="input">
                            <label>Nombre</label>
                            <input type="text" name="nombre" class="form-control" value="<?php echo $nombre; ?>" readonly>
                        </div>
                        <div class="input">
                            <label>Stock</label>
                            <input type="number" name="stock" class="form-control" value="<?php echo $stock; ?>" readonly>
                        </div>
                        <div class="input">
                            <label>Precio</label>
                            <input type="text" name="precio" class="form-control" value="<?php echo $precio; ?>" readonly>
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