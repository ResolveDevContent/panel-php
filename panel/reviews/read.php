<?php
// Check existence of id parameter before processing further
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    // Include config file
    require_once "../config.php";
    // require_once "../errors.php";

    // Prepare a select statement
    $sql = "SELECT * FROM reviews WHERE id = ?";

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
                $texto = $row["texto"];
                $empresa = $row["empresa"];
                $estrellas = $row["estrellas"];
                $avatar = $row["avatar"];
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

    // Close statement
    mysqli_stmt_close($stmt);

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
        $title = "Ver Testimonio";
        include_once("../includes/head.php");
    ?>

    <body>
        <section class="d-flex">
            <?php include_once("../includes/menu.php"); ?>
            <article id="container">
                <div class="wrapper">
                    <div class="form-container d-flex flex-col">
                        <a href="reviews.php" class="d-flex align-center">
                            <i class="icon left-arrow"></i>
                            <span>Volver</span>
                        </a>
                        <header class="d-flex flex-col align-center justify-center text-center">
                            <h2>Ver Testimonio</h2>
                        </header>
                        <div class="input">
                            <label>Nombre</label>
                            <input type="text" name="nombre" class="form-control" value="<?php echo $nombre; ?>" readonly>
                        </div>
                        <div class="input">
                            <label>Texto</label>
                            <input type="text" name="texto" class="form-control" value="<?php echo $texto; ?>" readonly>
                        </div>
                        <div class="input">
                            <label>Empresa</label>
                            <input type="text" name="empresa" class="form-control" value="<?php echo $empresa; ?>" readonly>
                        </div>
                        <div class="input">
                            <label>Estrellas</label>
                            <input type="number" name="estrellas" class="form-control" value="<?php echo $estrellas; ?>" readonly>
                        </div>
                        <div class="input">
                            <label>Avatar</label>
                            <figure>
                                <img src="<?php echo $avatar; ?>" alt=''>
                            </figure>
                        </div>
                    </div>
                </div>
            </article>
        </section>
    </body>
</html>