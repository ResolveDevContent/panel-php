<?php
    // Process delete operation after confirmation
    if(isset($_POST["productId"]) && !empty($_POST["productId"])){
        // Include config file
        require_once "../config.php";
        
        // Prepare a delete statement
        $sql = "DELETE FROM products WHERE productId = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_productId);
            
            // Set parameters
            $param_productId = trim($_POST["productId"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records deleted successfully. Redirect to landing page
                header("location: productos.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
        
        // Close connection
        mysqli_close($link);
    } else{
        // Check existence of id parameter
        if(empty(trim($_GET["productId"]))){
            // URL doesn't contain id parameter. Redirect to error page
            header("location: error.php");
            exit();
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

    <?php 
        $title = "Borrar producto";
        include_once("../includes/head.php"); 
    ?>

    <body>
        <section class="d-flex">
            <?php include_once("../includes/menu.php"); ?>
            <article id="container">
                <div class="wrapper">
                    <div class="background"></div>
                    <div class="popover-container d-flex align-center justify-center">
                        <div class="popover d-flex flex-col align-center justify-center text-center">
                            <header class="page-header">
                                <h1>Borrar Producto</h1>
                            </header>
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                <div>
                                    <input type="hidden" name="productId" value="<?php echo trim($_GET["productId"]); ?>"/>
                                    <p>Está seguro que deseas borrar el producto con id: <?php echo trim($_GET["productId"]); ?></p><br>
                                    <p>
                                        <input type="submit" value="Si" class="btn btn-error">
                                        <a href="./productos.php" class="btn btn-default">No</a>
                                    </p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </article>
    </body>
</html>