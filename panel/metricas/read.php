<?php
// Check existence of id parameter before processing further
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    // Include config file
    require_once "../config.php";
    // require_once "../errors.php";

    // Prepare a select statement
    $sql = "SELECT * FROM metricas WHERE id = ?";

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
                $imagen = $row["imagen"];
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
        $title = "Ver Metrica";
        include_once("../includes/head.php");
    ?>

    <body>
        <section class="d-flex">
            <?php include_once("../includes/menu.php"); ?>
            <article id="container">
                <div class="wrapper">
                    <div class="form-container d-flex flex-col">
                        <a href="metricas.php" class="d-flex align-center">
                            <i class="icon left-arrow"></i>
                            <span>Volver</span>
                        </a>
                        <header class="d-flex flex-col align-center justify-center text-center">
                            <h2>Ver Metrica</h2>
                        </header>
                        <div class="input">
                            <label>Imagen</label>
                            <figure>
                                <img src="<?php echo $imagen; ?>" alt=''>
                            </figure>
                        </div>
                    </div>
                </div>
            </article>
        </section>
    </body>
</html>