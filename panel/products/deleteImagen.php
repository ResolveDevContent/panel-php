<?php
    $productId = trim($_GET["productId"]);

    $table = "products_images";
    $id = "imagenId";
    // $location = "update.php?productId=$productId";
    $isInProduct = false;
    $location = "update.php?productId=". trim($_GET["productId"]) ."";
    include_once("../controllers/delete.php")
?>
<!DOCTYPE html>
<html lang="en">

    <?php 
        $title = "Borrar imagen";
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
                                    <input type="hidden" name="imagenId" value="<?php echo trim($_GET["imagenId"]); ?>"/>
                                    <p>Está seguro que deseas borrar la imagen id: <?php echo trim($_GET["imagenId"]); ?></p><br>
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