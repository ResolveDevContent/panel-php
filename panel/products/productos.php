<!DOCTYPE html>
<html lang="en">

    <?php
        session_start();

        include("../config.php");
        require_once "../errors.php";
        
        $title = "Productos";
        include_once("../includes/head.php"); 
        
    ?>

    <body>
        <section class="d-flex">
            <?php include_once("../includes/menu.php"); ?>
            <article id="container">
                <div class="wrapper d-flex flex-col">
                    <header class="d-flex justify-between align-center">
                        <h2>Productos</h2>
                        <a href="create.php" class="btn btn-primary">Agregar nuevo producto</a>
                    </header>
                    <div class="table-wrapper">
                        <?php
                        // Include config file
                        require_once "../config.php";
                        
                        // Attempt select query execution
                        $sql = "SELECT * FROM products";
                        if($result = mysqli_query($link, $sql)){
                            if(mysqli_num_rows($result) > 0){
                                echo "<table class='fl-table'>";
                                    echo "<thead>";
                                        echo "<tr>";
                                            echo "<th>#</th>";
                                            echo "<th>Nombre</th>";
                                            echo "<th>Stock</th>";
                                            echo "<th>Precio</th>";
                                            echo "<th>Acción</th>";
                                        echo "</tr>";
                                    echo "</thead>";
                                    echo "<tbody>";
                                    while($row = mysqli_fetch_array($result)){
                                        echo "<tr>";
                                            echo "<td><span>" . $row['productId'] . "</span></td>";
                                            echo "<td><span>" . $row['nombre'] . "</span></td>";
                                            echo "<td><span>" . $row['stock'] . "</span></td>";
                                            echo "<td><span>" . $row['precio'] . "</span></td>";
                                            echo "<td>";
                                                echo "<ul class='d-flex align-center'>";
                                                    echo "<li><a href='read.php?productId=". $row['productId'] ."' title='Ver'><svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' style='fill: rgba(0, 0, 0, 1);transform: ;msFilter:;'><path d='M12 9a3.02 3.02 0 0 0-3 3c0 1.642 1.358 3 3 3 1.641 0 3-1.358 3-3 0-1.641-1.359-3-3-3z'></path><path d='M12 5c-7.633 0-9.927 6.617-9.948 6.684L1.946 12l.105.316C2.073 12.383 4.367 19 12 19s9.927-6.617 9.948-6.684l.106-.316-.105-.316C21.927 11.617 19.633 5 12 5zm0 12c-5.351 0-7.424-3.846-7.926-5C4.578 10.842 6.652 7 12 7c5.351 0 7.424 3.846 7.926 5-.504 1.158-2.578 5-7.926 5z'></path></svg></a></li>";
                                                    echo "<li><a href='update.php?productId=". $row['productId'] ."' title='Actualizar'><svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' style='fill: rgba(0, 0, 0, 1);transform: ;msFilter:;'><path d='m18.988 2.012 3 3L19.701 7.3l-3-3zM8 16h3l7.287-7.287-3-3L8 13z'></path><path d='M19 19H8.158c-.026 0-.053.01-.079.01-.033 0-.066-.009-.1-.01H5V5h6.847l2-2H5c-1.103 0-2 .896-2 2v14c0 1.104.897 2 2 2h14a2 2 0 0 0 2-2v-8.668l-2 2V19z'></path></svg></a></li>";
                                                    echo "<li><a href='delete.php?productId=". $row['productId'] ."' title='Borrar'><svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' style='fill: rgba(0, 0, 0, 1);transform: ;msFilter:;'><path d='M15 2H9c-1.103 0-2 .897-2 2v2H3v2h2v12c0 1.103.897 2 2 2h10c1.103 0 2-.897 2-2V8h2V6h-4V4c0-1.103-.897-2-2-2zM9 4h6v2H9V4zm8 16H7V8h10v12z'></path></svg></a></li>";
                                                echo "</ul>";
                                            echo "</>";
                                        echo "</tr>";
                                    }
                                    echo "</tbody>";                            
                                echo "</table>";
                                // Free result set
                                mysqli_free_result($result);
                            } else{
                                echo "<p><em>No records were found.</em></p>";
                            }
                        } else{
                            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                        }
    
                        // Close connection
                        mysqli_close($link);
                        ?>
                    </div>
                </div>
            </article>
        </section>
    </body>
</html>